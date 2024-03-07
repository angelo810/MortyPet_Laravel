<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nueva Mascota</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name"></label>
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Nombre">
                        @error('name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="age"></label>
                        <input wire:model="age" type="text" class="form-control" id="age" placeholder="Edad">
                        @error('age')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description"></label>
                        <input wire:model="description" type="text" class="form-control" id="descripcion"
                            placeholder="Description">
                        @error('description')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="breed_id"></label>
                        <select wire:model="breed_id" class="form-control" name="" id="breed_id">
                            <option value="0">-Seleccione-</option>
                            @foreach ($breeds as $name => $id)
                                <option value="{{ $id }}"> {{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image"></label>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input wire:model="image" type="file" class="form-control" id="image" accept="image/*">
                            @error('image')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="available"></label>
                        <input wire:model="available" type="text" class="form-control" id="available"
                            placeholder="Disponibilidad">
                        @error('available')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Pet</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="description"></label>
                        <input wire:model="description" type="text" class="form-control" id="description"
                            placeholder="Description">
                        @error('description')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="breed_id"></label>
                        <select wire:model="breed_id" class="form-control" name="" id="breed_id">
                            <option value="0">-Seleccione-</option>
                            @foreach ($breeds as $name => $id)
                                <option value="{{ $id }}"> {{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image_url"></label>
                        <input wire:model="image_url" type="text" class="form-control" id="image_url"
                            placeholder="Image Url">
                        @error('image_url')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="available"></label>
                        <input wire:model="available" type="text" class="form-control" id="available"
                            placeholder="Available">
                        @error('available')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
