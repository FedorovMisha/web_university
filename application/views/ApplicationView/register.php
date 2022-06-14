<form class="container p-5 my-5" action="/app/register" method="POST">
    <h1>Register</h1>
    <div class="text-danger my-4">
        <h4 id="log"></h4>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" require class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" id="emailInput" class="form-control" id="exampleInputEmail1" name="login" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>


    <script>

        function check_email(e) {
            let request = new XMLHttpRequest();
            var formData = new FormData();

            formData.append("email", e.target.value);
            request.open('POST', "http://localhost:3000/api/check-email", true);
            request.send(formData);

            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let obj = JSON.parse(request.responseText);
                    let log = document.getElementById("log");
                    console.log(obj);
                    if (obj.status == "fail") {
                        log.innerText = "User is exists";
                    } else {
                        console.log("Ok")
                        log.innerText = "";
                    }
                }
            }
        }

        document.getElementById("emailInput").addEventListener("input", check_email);
        console.log("ok");

    </script>
</form>