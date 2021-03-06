<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/login/login.css" />
    <title>Movie Bookmark Application - Login</title>
  </head>
  <body>
    <div class="container-fluid ps-md-0">
      <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
          <div class="login d-flex align-items-center py-5">
            <div class="container">
              <div class="row">
                <div class="col-md-9 col-lg-8 mx-auto">
                  <h3 class="login-heading mb-4">Welcome back!</h3>

                  <!-- Sign In Form -->
                  <form name="login" method="POST" action="/../functions.php">
                    <div class="form-floating mb-3">
                      <input
						name="username"
                        type="text"
                        class="form-control"
                        id="floatingInputUsername"
                        placeholder="myusername"
                        required
                        autofocus
                      />
                      <label for="floatingInput">User Name</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input
						
						name="password"
                        type="password"
                        class="form-control"
                        id="floatingPassword"
                        placeholder="Password"
                        required
                      />
                      <label for="floatingPassword">Password</label>
                    </div>

                    <div class="form-check mb-3">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        id="rememberPasswordCheck"
                      />
                      <label
                        class="form-check-label"
                        for="rememberPasswordCheck"
                      >
                        Remember password
                      </label>
                    </div>

                    <div class="d-grid">
                      <button
						name="login"
                        class="
                          btn btn-lg btn-primary btn-login
                          text-uppercase
                          fw-bold
                          mb-2
                        "
                        type="submit"
                      >
                        Sign in
                      </button>
                      <div class="text-center">
                        <a class="small"  href="/register/register.php"
                          >Register</a
                        >
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
