<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use App\Models\Shelter;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ShelterPet;

class ShelterPets extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $shelter_id, $pet_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $pets = Pet::pluck('id','name');
        $shelters = Shelter::pluck('id','name');
        return view('livewire.shelter-pets.view', ["pets"=>$pets,"shelters"=>$shelters], [
            'shelterPets' => ShelterPet::latest()
						->orWhere('shelter_id', 'LIKE', $keyWord)
						->orWhere('pet_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->shelter_id = null;
		$this->pet_id = null;
    }

    public function store()
    {
        $this->validate([
		'shelter_id' => 'required',
		'pet_id' => 'required',
        ]);

        ShelterPet::create([
			'shelter_id' => $this-> shelter_id,
			'pet_id' => $this-> pet_id
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'ShelterPet Successfully created.');
    }

    public function edit($id)
    {
        $record = ShelterPet::findOrFail($id);
        $this->selected_id = $id;
		$this->shelter_id = $record-> shelter_id;
		$this->pet_id = $record-> pet_id;
    }

    public function update()
    {
        $this->validate([
		'shelter_id' => 'required',
		'pet_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = ShelterPet::find($this->selected_id);
            $record->update([
			'shelter_id' => $this-> shelter_id,
			'pet_id' => $this-> pet_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'ShelterPet Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            ShelterPet::where('id', $id)->delete();
        }
    }
}
