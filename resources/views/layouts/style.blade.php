
<style>
    body, html {
        height: 80%;
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        position: relative;
    }

    .hero-image {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("https://truonganblog.com/wp-content/uploads/2019/02/header-bg.jpg");
        height: 50%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .hero-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    section {
        padding: 8px;
    }

    #footer {
        position: fixed;
        left: 0;
        bottom: 0;
        height: 4%;
        width: 100%;
        background: #007b5e !important;
    }
    .content {
        position: absolute;
        color: white;
    }
    .degrees {
        font-size: 2.7rem;
        font-weight: 300;
        color: white;
        line-height: 1;
    }
    .data {
        animation-name: slide-up;
        animation-delay: 0.6s;
        animation-duration: 0.5s;
        animation-fill-mode: backwards;
        animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1);
    }


</style>
