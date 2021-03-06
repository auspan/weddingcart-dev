<form class="form-inline" id="add-guest-form">
    <div class="table-responsive table-bordered table-hover">
        <table class="table">
        <tr>
            <th class="hidden"></th>
            <th></th>
            <th>
                <label class="control-label" for="guestName">Name: </label>
                <input class="form-control" type="text" name="guestName" id="guestName" placeholder="Name">
            </th>
            <th>
                <label class="control-label" for="guestEmail">Email: </label>
                <input class="form-control" type="text" name="guestEmail" id="guestEmail" placeholder="Email">
            </th>
            <th>
                <label class="control-label" for="guestPhone">Phone: </label>
                <input class="form-control" type="text" name="guestPhone" id="guestPhone" placeholder="Phone">
            </th>
            <th>
                <button  id="addRow" data-toggle="tooltip" title="add contact" data-placement="bottom" type="submit" class="btn-add btn" aria-label="Add">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
            </th>
            <th>
                <a href="{{ url('googlecontacts') }}" data-toggle="tooltip" title="get google contacts" data-placement="bottom">
                    <i class="icon-gplus"></i>
                </a>
                {{--<button type="button" class="btn btn-default" aria-label="Google">--}}
                {{--</button>--}}
            </th>
            <th></th>
        </tr>
        </table>
    </div>
</form>
<form id="update-guest-form">
<div class="table-striped table-hover table-responsive">
    <table id="guestsTable" class="table">
    <thead>
        <tr>
            <th class="hidden"></th>
            <th>
                <div class="checkbox-inline">
                    <label>
                        <input type="checkbox" id="checkAll" name="query_myTextEditBox">
                    </label>
                </div>
            </th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th></th>
            <th><button class="btn btn-default" id="deleteSelected" data-toggle="tooltip" title="Delete" data-placement="bottom" type="button" class="btn btn-default" aria-label="Delete">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach($people as $person)
            <tr id="row{{$i}}">
                <td class="hidden">{{ $person['id'] }}</td>
                <td scope="row"><input type="checkbox" id="checkbox-{{ $i }}" class="selectRow" name="contacts"></td>
                <td>{{ $person['name']}}</td>
                <td id="email{{$i}}">{{ $person['email'] }}</td>
                <td>{{ $person['phone'] }}</td>
                <td>
                    <button class="editRow btn btn-default" data-toggle="tooltip" title="Edit" data-placement="bottom" type="button" aria-label="Edit">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>
                <td>
                    <button class="deleteRow btn btn-default" data-toggle="tooltip" title="Delete" data-placement="bottom" type="button" class="btn btn-default" aria-label="Delete">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>
            <?php  $i++; ?>
        @endforeach
    </tbody>
</table>
</div>
<div class="center bottommargin-lg">
<a href="{{ url('showinvite') }}" class="button button-rounded button-xlarge">Invite</a>
</div>
</form>

