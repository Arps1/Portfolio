{{-- resources/views/test.blade.php --}}
<h1>Test Page</h1>
<p>Hello, {{ Auth::user()->name ?? 'guest' }}</p>
