<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Breed;

class Breeds extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $size;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.breeds.view', [
            'breeds' => Breed::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('size', 'LIKE', $keyWord)
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
		$this->size = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'size' => 'required',
        ]);

        Breed::create([ 
			'name' => $this-> name,
			'size' => $this-> size
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Breed Successfully created.');
    }

    public function edit($id)
    {
        $record = Breed::findOrFail($id);
        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->size = $record-> size;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'size' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Breed::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'size' => $this-> size
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Breed Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Breed::where('id', $id)->delete();
        }
    }
}