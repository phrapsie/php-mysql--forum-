<form class="login-form form-inline ml-sm-auto mr-sm-2 mx-auto" method='post' action='login-out-controller.php'>
            <div class='d-flex flex-column flex-sm-row'>
                <label class="sr-only" for="inlineFormInput">Username</label>
                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder='username' name='name'>

                <label class="sr-only" for="inlineFormInputGroup2">Password</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input type="text" class="form-control" id="inlineFormInputGroup2" placeholder='password' name='password'>
                </div>

                <button type="submit" name='login-submit' class="btn btn-danger">Log in</button>
            </div>
        </form>