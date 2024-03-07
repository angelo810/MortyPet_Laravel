<?php

namespace App\Http\Livewire;

use App\Models\Breed;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pet;
use Livewire\WithFileUploads;

class Pets extends Component
{
    use WithFileUploads;
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $age, $description, $breed_id, $image_url, $available, $image;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $breeds = Breed::pluck('id','name');
        return view('livewire.pets.view', ["breeds"=>$breeds], [
            'pets' => Pet::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('age', 'LIKE', $keyWord)
						->orWhere('description', 'LIKE', $keyWord)
						->orWhere('breed_id', 'LIKE', $keyWord)
						->orWhere('image_url', 'LIKE', $keyWord)
						->orWhere('available', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->name = null;
		$this->age = null;
		$this->description = null;
		$this->breed_id = null;
		$this->image_url = null;
		$this->available = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
        'image' => 'image|max:2048',
        ]);

        $imageUrl = $this->image->store('images', 'public');
        Pet::create([
			'name' => $this-> name,
			'age' => $this-> age,
			'description' => $this-> description,
			'breed_id' => $this-> breed_id,
			'image_url' => $imageUrl,
			'available' => $this-> available
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Pet Successfully created.');
    }

    public function edit($id)
    {
        $record = Pet::findOrFail($id);
        $this->selected_id = $id;
		$this->name = $record-> name;
		$this->age = $record-> age;
		$this->description = $record-> description;
		$this->breed_id = $record-> breed_id;
		$this->image_url = $record-> image_url;
		$this->available = $record-> available;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pet::find($this->selected_id);
            $record->update([
			'name' => $this-> name,
			'age' => $this-> age,
			'description' => $this-> description,
			'breed_id' => $this-> breed_id,
			'image_url' => $this-> image_url,
			'available' => $this-> available
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Pet Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Pet::where('id', $id)->delete();
        }
    }
}
