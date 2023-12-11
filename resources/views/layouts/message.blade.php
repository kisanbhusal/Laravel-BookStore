
@if (Session::has('success'))
    
<div class="fixed top-5 right-5" id="messagebox">
    <p class="bg-green-500 text-white px-4 py-1 rounded-lg shadow text-lg font-bold"> {{ session('success') }}</p>
</div>
<script>//using arrow function
    setTimeout(() => {
        $('#messagebox').fadeOut(500);
    }, 2000);
</script>
@endif