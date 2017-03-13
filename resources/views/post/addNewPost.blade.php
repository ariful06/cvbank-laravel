@extends('Admin.master')

@section('Content')
<div class="content">
    <div class="panel panel-info">
        <div class="panel-heading">Add Posts</div>
        <div class="panel-body">
            <div class="col-md-offset-1 col-md-10">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title:</label>
                        <input type="text" class="form-control"  name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="comment">Description:</label>
                        <textarea class="form-control" rows="3" placeholder="Description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tag:</label>
                        <input type="text" class="form-control"  name="tags" placeholder="Tag">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category:</label>
                        <input type="text" class="form-control"  name="categories" placeholder="Category">
                    </div>
                    <button type="submit" name="button" class="btn btn-primary btn-lg pull-right">Add Posts</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection