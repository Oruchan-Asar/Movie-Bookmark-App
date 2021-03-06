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
    <script src="/register/register.css"></script>
    <style>
      body {
        background: #007bff;
        background: linear-gradient(to right, #0062e6, #33aeff);
      }

      .card-img-left {
        width: 45%;
        /* Link to your background image using in the property below! */
        background-image: url(/assets/images/new_entries.svg);
        background-size: cover;
        background-position: center;
        background-size: 400px;
        background-repeat: no-repeat;
      }

      .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
      }
    </style>
    <title>Movie Bookmark Application - Register</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
          <div
            class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden"
          >
            <div class="card-img-left d-none d-md-flex">
              <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body p-4 p-sm-5">
              <h5 class="card-title text-center mb-5 fw-light fs-5">
                Register
              </h5>
              <form name="insert" method="POST" action="/../functions.php">
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
                  <label for="floatingInputUsername">Username</label>
                </div>

                <div class="form-floating mb-3">
                  <input
					name="email"
                    type="email"
                    class="form-control"
                    id="floatingInputEmail"
                    placeholder="name@example.com"
                    required
                  />
                  <label for="floatingInputEmail">Email address</label>
                </div>

                <hr />

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

                <div class="form-floating mb-3">
                  <input
                    type="password"
                    class="form-control"
                    id="floatingPasswordConfirm"
                    placeholder="Confirm Password"
                    required
                  />
                  <label for="floatingPasswordConfirm">Confirm Password</label>
                </div>

                <div class="d-grid mb-2">
                  <button
				  name="insert"
                    class="
                      btn btn-lg btn-primary btn-login
                      fw-bold
                      text-uppercase
                    "
                    type="submit"
                  >
                    Register
                  </button>
                </div>

                <a
                  class="d-block text-center mt-2 small"
                  href="/login/login.php"
                  >Have an account? Sign In</a
                >

                <hr class="my-4" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/register/register.js"></script>
  </body>
</html>
