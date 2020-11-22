@if($status)

<h3> Verified </h3>

<p> User is verified, you will be redirected back to homepage in few seconds </p>

@else

<h3> Failed to verify </h3>

<p> Please confirm the opened link is correct, you will be redirected back to homepage in few seconds </p>

@endif

<script>

    setTimeout(() => {
        window.location = "/";
    }, 500);

</script>