@extends('layouts.layout')

@section('content')

    @if(!session()->has('message'))
        <div id="crud">

            <form @submit="postData">
                @csrf
                @include('student.form')
                <div>
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
{{--            <p>Name is: @{{ name }}</p>--}}
            <h1 style="color:red" class="text-center">Students List</h1>
            <div class="row">
                <div class="col-4 text-center" ><h4>Name</h4></div>
                <div class="col-8 text-center">
                   <h4>Action</h4>
                </div>

            </div>
            <hr/>
            <ol>
                <li v-for="student in students">
                    <div class="row py-2">
                        <div class="col-6">@{{ student.name }}</div>
                        <div class="col-3">
                            <button class="btn btn-primary"  @click="openModal(student)">Edit</button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-danger" @click="deleteTuple(student.id)">Delete</button>
                        </div>
                    </div>
                </li>
            </ol>

        </div>
    @endif

    <div class="modal fade" id="exampleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Current User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <label for="name">Name:</label>
                    <div class="form-group">
                        <input type="text" v-model="preData.name" name="name"  class="form-control">
                        <div>{{ $errors->first('name') }}</div>
                    </div>


                    <label for="email">Email:</label>
                    <div class="form-group">
                        <input type="text" v-model="preData.email" name="email"   class="form-control">
                        <div>{{ $errors->first('email') }}</div>
                    </div>

                    <label for="address">Address:</label>
                    <div class="form-group">
                        <input type="text" name="address" v-model="preData.address"   class="form-control">
                        <div>{{ $errors->first('address') }}</div>
                    </div>
                    @csrf
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="{{ mix('js/crud.js') }}"></script>

@endsection
