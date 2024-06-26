<div id="popup-edit-{{$beverage->id}}" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" tabindex="-1">
    <div class="relative w-full max-w-4xl px-4 h-full md:h-auto">
        <div  class="fixed inset-0 bg-black bg-opacity-50"></div>
        <!--modal content-->
        <div class="relative flex-wrap bg-white rounded-lg shadow dark:bg-gray-700 px-5 py-4">
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                <!--header modal-->
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Editar bebestible</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-orange-600 dark:hover:text-white" data-modal-hide="popup-edit-{{$beverage->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
            </div>
            <!--body modal-->
            <div class="col-span-6 sm:col-span-3">
                <form action="{{ route('beverages.update', $beverage->id) }}" method="POST"  enctype="multipart/form-data" class="flex p-2 ">
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="grid grid-cols-6 gap-6 border-b pb-6 border-gray-200 border-opacity-15">
                        <div class="col-span-6 sm:col-span-3">
                            {{ Form::label('Nombre', null, ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left']) }}
                            {{ Form::text('name', $beverage->name, ['class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            {{ Form::label('Descripcion', null, ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left']) }}
                            {{ Form::text('description', $beverage->description, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            {{ Form::label('Precio', null, ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left']) }}
                            {{ Form::text('price', $beverage->price, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
                            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            {{ Form::label('Alcohol', null, ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left']) }}
                            {{ Form::text('alcohol', $beverage->alcohol, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500' . ($errors->has('alcohol') ? ' is-invalid' : ''), 'placeholder' => 'Alcohol']) }}
                            {!! $errors->first('alcohol', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            {{ Form::label('Valoracion', null, ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left']) }}
                            {{ Form::text('rating', $beverage->rating, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500' . ($errors->has('rating') ? ' is-invalid' : ''), 'placeholder' => 'Valorizacion']) }}
                            {!! $errors->first('rating', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            {{ Form::label('type_id', 'Tipo de plato', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left']) }}
                            {{ Form::select('type_id', $types, $beverage->type_id, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500' . ($errors->has('type_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Type']) }}
                            {!! $errors->first('type_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            {{ Form::label('photo', 'Photo', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left']) }}
                            {{ Form::file('photo', ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500' . ($errors->has('photo') ? ' is-invalid' : ''), 'placeholder' => 'Photo']) }}
                            {!! $errors->first('photo', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                    </div>
                    <div class="flex justify-center w-full items-center p-6  rounded-b ">
                        <button type="submit" class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-500">
                            Guardar Cambios
                        </button>
                        <button type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-orange-500 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="popup-edit-{{$beverage->id}}">
                            Omitir cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



