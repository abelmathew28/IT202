.fixed-header,
.fixed-footer {
    width: 100%;
    position: fixed;
    background: #c00;
    padding: 15px 0;
    color: #fff;
    margin-left: -8px;
    text-align: center;
    border-bottom: 2px solid #ccc;
}

.fixed-header {
    top: 0;
}

.containers {
    width: 80%;
    margin: 0 auto;
    /* Center the DIV horizontally */
}

body {
    background-color: #fff;
    font-family: "Lato", sans-serif;
}



.main-head {
    height: 150px;
    background: #FFF;

}

span {
    float: left;
    width: 180px;
    padding-right: 50px;
}

.submit-link {
    background-color: rgb(6, 100, 22);
    color: #fff;
    padding: 10px;
    border-radius: 5px;
}


button,
input,
optgroup,
select,
textarea {
    margin: 0;
    padding: 5px;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}

.sidenav {
    height: 100%;
    background-color: #ccc;
    overflow-x: hidden;
    padding-top: 20px;
    background-size: cover;
}

.login-main-text {
    padding: 60px;
    color: #000;
    margin: 20% 5%;
    opacity: 0.8;
    background-color: #ccc;
}

.user-main-text {
    padding: 60px;
    color: #000;
    margin: 20% 5%;
    opacity: 0.8;
    border: solid #ccc 1px;
}

.text-details a {
    color: #000;
    text-decoration: none;
}

.text-details a:hover {
    color: rgb(10, 54, 1);
    font-weight: bold;
    text-decoration: none;
}

nav a,
nav a:hover {
    color: #fff;
    text-decoration: none;
    padding: 7px 25px;
    display: inline-block;
}

nav a:hover {
    font-weight: bold;
}

.container p {
    line-height: 200px;
    color: #000;
    /* Create scrollbar to test positioning */
}

.right {
    color: #fff;
    text-decoration: none;
    padding: 7px 25px;
    display: inline-block;
    display: inline;
    text-align: right;
    float: right;

}

.form-group {
    margin-bottom: 1rem;
}

label {
    display: inline-block;
    margin-bottom: .5rem;
}

.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.left {
    font-size: 20px;
    color: green;
    text-decoration: none;
    padding: 7px 25px;
    display: inline-block;
    display: inline;
    text-align: left;
    float: left;

}

.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {
        padding-top: 15px;
    }
}

@media screen and (max-width: 450px) {
    .login-form {
        margin-top: 10%;
    }

    .user-action {
        margin-top: 10%;
    }

    .register-form {
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px) {
    .main {
        margin-left: 40%;
    }

    .sidenav {
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 70px;
        left: 0;
    }

    .login-form {
        margin-top: 55%;
        margin-left: 10%;
        min-width: 450px;
    }

    .user-action {
        margin-top: 55%;
        min-width: 450px;
    }

    .register-form {
        margin-top: 20%;
    }
}
