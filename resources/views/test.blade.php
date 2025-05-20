<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('')}}">
     <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <div class="card mx-auto p-5">
        {{-- form --}}
        <form action="{{ isset($note) ?  route('test.update', $note->id) : route('test.save') }}" method="post">
            @csrf
            @if(isset($note))
            @method('put')
            @endif
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{ old('name', $note->name ?? '') }}" name="name" id="name" placeholder="Enter your name" class="form-control">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <input type="text" value="{{old('note', $note->note ?? '')}}" name="note" id="note" placeholder="Enter your note" class="form-control">
                        @error('note')
                           <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{old('email', $note->email ?? '')}}" name="email" id="email" placeholder="Enter your email" class="form-control">
                        @error('email')
                           <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto mt-5">
                    <table class="table table-hover table-striped   ">
                        <thead>
                            <th>id</th>
                            <th>name</th>
                            <th>note</th>
                            <th>email</th>
                            <th>action</th>
                        </thead>
                        <tbody>
                            @foreach ($notes as $data)
                            <tr>
                                <td class="text-sm"> {{$data->id}}</td>
                                <td class="text-sm"> {{$data->name}}</td>
                                <td class="text-sm"> {{$data->note}}</td>
                                <td class="text-sm"> {{$data->email}}</td>
                                <td class="text-sm d-flex gap-2">
                                    <a href="{{route('test.delete',['id'=>$data->id])}}" class="text-sm nav-link text-danger">delete</a> |
                                    <a href="{{route('test.edit',["id"=>$data->id])}}" class="text-sm nav-link text-success">Update</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
