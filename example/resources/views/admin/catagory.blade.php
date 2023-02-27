<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
    .div_center
    {
        text-align: center;
        padding-top: 40px;
    }
    .h2_font
    {
        font-size: 40px;
        padding-bottom: 40px;
    }
    .input_color
    {
        color: black;
    }
    .center
    {
        margin:auto;
        width:50%;
        text-align:center;
        margin-top:30px;
        border:2px solid green;
    }
    .th_color
    {
        color: yellow;
        border-bottom: 1px solid green;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      <!-- partial -->
     @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>

                @endif

                <div class="div_center">
                    <h2 class="h2_font">Add Catagory</h2>
                    <form action="{{url('/add_catagory')}}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="catagory" placeholder="Write Catagory Name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
                    </form>
                </div>

                <table class="center">
                    <tr class="th_color">
                        <td>Catagory Name</td>
                        <td>Action</td>
                    </tr>

                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->catagory_name}}</td>
                        <td><a onclick="return confirm('ak bar soch le')" class="btn btn-danger" href="{{url('delete_catagory',$data->id)}}">Delete</a></td>
                    </tr>


                    @endforeach

                </table>
            
            </div>
        </div>
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>


