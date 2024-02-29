<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Request</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="request_date"></label>
                        <input wire:model="request_date" type="date" class="form-control" id="request_date" placeholder="Request Date">@error('request_date') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pet_id"></label>
                        <select wire:model="pet_id" class="form-control" name="" id="pet_id">
                            <option value="0">-Seleccione-</option>
                            @foreach ($pets as $name => $id)
                                <option value="{{ $id }}"> {{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="client_name"></label>
                        <input wire:model="client_name" type="text" class="form-control" id="client_name" placeholder="Client Name">@error('client_name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="message"></label>
                        <input wire:model="message" type="text" class="form-control" id="message" placeholder="Message">@error('message') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Request</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="request_date"></label>
                        <input wire:model="request_date" type="date" class="form-control" id="request_date" placeholder="Request Date">@error('request_date') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pet_id"></label>
                        <select wire:model="pet_id" class="form-control" name="" id="pet_id">
                            <option value="0">-Seleccione-</option>
                            @foreach ($pets as $name => $id)
                                <option value="{{ $id }}"> {{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="client_name"></label>
                        <input wire:model="client_name" type="text" class="form-control" id="client_name" placeholder="Client Name">@error('client_name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="message"></label>
                        <input wire:model="message" type="text" class="form-control" id="message" placeholder="Message">@error('message') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
