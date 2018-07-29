    <div class="box box-info">

        <div class="box-header with-border">
            <h3 class="box-title">User Information</h3>
        </div>

        @if(isset($user))
        <form class="form-horizontal" method="post" action="{{ url("/admin/moderator/$user->id") }}">
        @else
            <form class="form-horizontal" method="post" action="{{ url("/admin/moderator/") }}">

        @endisset

            <div class="box-body">
                {{ csrf_field() }}

                <input type="hidden" name="role" value="{{ USER_ROLE_ADMIN }}"/>
                @component('npms.admin.components.bootstrap.form-group', ['name' => 'First Name'])
                    <input type="text" class="form-control" id="title" maxlength="100" required
                           value="{{ isset($user) ? $user->name : ''  }}"
                           placeholder="First name" name="first_name">
                @endcomponent

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'Last Name'])
                    <input type="text" class="form-control" id="title" maxlength="100" required
                           value="{{ isset($user) ? $user->last_name : ''  }}"
                           placeholder="Last name" name="last_name">
                @endcomponent

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'Email'])
                    <input type="email" class="form-control" id="title" maxlength="100" required
                           value="{{ isset($user) ? $user->email : ''  }}"
                           {{ isset($user) ? "DISABLED" : ""}}
                           placeholder="Email" name="email">
                @endcomponent


                @component('npms.admin.components.bootstrap.form-group', ['name' => 'Status'])

                    <div class="radio">
                        <label>
                            <input type="radio" name="user_status" id="user_status_inactive" value="0" checked>
                            Inactive
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="user_status" id="user_status_active" value="1">
                            Active
                        </label>
                    </div>
                @endcomponent


            </div>

            <div class="box-footer">
                @isset($label)
                <a href="/admin/moderator/create" class="btn btn-default btn-flat btn-sm"><i class="fas fa-plus"></i> Add New</a>
                @endisset

                <button type="submit" class="btn btn-info pull-right"><i class="fas fa-save"></i> Save</button>
            </div>

        </form>

    </div>
