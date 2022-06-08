<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            .select2 {
                width: 100% !important;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('GENE') }}
                    </h2>
                </div>
            </header>
            <!-- Page Content -->
            <main>
                <div class="container">
                    <form method="post" action="{{route('gene.store')}}" id="insert_form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="table">table</label>
                                <input type="text" class="form-control" name="table" id="table" placeholder="table">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="parent">parent</label>
                                <input type="text" class="form-control" name="parent" id="parent" placeholder="parent">
                            </div>
                        </div>
                        <div class="table-repsonsive">
                            <table class="table table-bordered" id="item_table">
                                <tr>
                                    <th>Column</th>
                                    <th>Type</th>
                                    <th>Filter</th>
                                    <th><button type="button" name="add" class="btn btn-success btn-sm add"><i class="fas fa-plus"></i></button></th>
                                </tr>
                            </table>
                            <div align="center">
                                <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                var counter = 1;
                $(document).on('click', '.add', function() {
                    var html = '';
                    html += '<tr>';
                    html += '<td><input type="text" name="columns[' + counter + '][column]" class="form-control item_name" /></td>';
                    html += '<td><select name="columns[' + counter + '][type]" class="form-control item_unit select2">{!!$options!!}</select></td>';
                    html += '<td><input type="checkbox" name="columns[' + counter + '][filter]" class="form-control item_name" /></td>';
                    html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fas fa-minus"></i></button></td></tr>';
                    $('#item_table').append(html);
                    counter++;
                    //for select 2
                    $('.select2').select2();
                });
                $(document).on('click', '.remove', function() {
                    $(this).closest('tr').remove();
                });
            });
        </script>
    </body>
</html>