<label for="name">Name:</label>
<div class="form-group">
    <input type="text" v-model="name" name="name" value="{{old('name') }}" class="form-control">
    <div>{{ $errors->first('name') }}</div>
</div>


<label for="email">Email:</label>
<div class="form-group">
    <input type="text" v-model="email" name="email" value="{{old('email')}}"  class="form-control">
    <div>{{ $errors->first('email') }}</div>
</div>

<label for="address">Address:</label>
<div class="form-group">
    <input type="text" name="address" v-model="address" value="{{old('address')}}"  class="form-control">
    <div>{{ $errors->first('address') }}</div>
</div>
<div>
    <button class="btn btn-primary">Add</button>
</div>
@csrf
