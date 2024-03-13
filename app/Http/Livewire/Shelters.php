<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Shelter;

class Shelters extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $address, $phone, $email;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.shelters.view', [
            'shelters' => Shelter::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('address', 'LIKE', $keyWord)
						->orWhere('phone', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
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
		$this->address = null;
		$this->phone = null;
		$this->email = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'address' => 'required',
        ]);

        Shelter::create([ 
			'name' => $this-> name,
			'address' => $this-> address,
			'phone' => $this-> phone,
			'email' => $this-> email
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Shelter Successfully created.');
    }

    public function edit($id)
    {
        $record = Shelter::findOrFail($id);
        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->address = $record-> address;
		$this->phone = $record-> phone;
		$this->email = $record-> email;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'address' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Shelter::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'address' => $this-> address,
			'phone' => $this-> phone,
			'email' => $this-> email
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Shelter Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Shelter::where('id', $id)->delete();
        }
    }
}