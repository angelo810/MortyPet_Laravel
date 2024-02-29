<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Request;

class Requests extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $request_date, $pet_id, $client_name, $message;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $pets = Pet::pluck('id','name');
        return view('livewire.requests.view', ["pets"=>$pets], [
            'requests' => Request::latest()
						->orWhere('request_date', 'LIKE', $keyWord)
						->orWhere('pet_id', 'LIKE', $keyWord)
						->orWhere('client_name', 'LIKE', $keyWord)
						->orWhere('message', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->request_date = null;
		$this->pet_id = null;
		$this->client_name = null;
		$this->message = null;
    }

    public function store()
    {
        $this->validate([
		'client_name' => 'required',
        ]);

        Request::create([
			'request_date' => $this-> request_date,
			'pet_id' => $this-> pet_id,
			'client_name' => $this-> client_name,
			'message' => $this-> message
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Request Successfully created.');
    }

    public function edit($id)
    {
        $record = Request::findOrFail($id);
        $this->selected_id = $id;
		$this->request_date = $record-> request_date;
		$this->pet_id = $record-> pet_id;
		$this->client_name = $record-> client_name;
		$this->message = $record-> message;
    }

    public function update()
    {
        $this->validate([
		'client_name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Request::find($this->selected_id);
            $record->update([
			'request_date' => $this-> request_date,
			'pet_id' => $this-> pet_id,
			'client_name' => $this-> client_name,
			'message' => $this-> message
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Request Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Request::where('id', $id)->delete();
        }
    }
}
