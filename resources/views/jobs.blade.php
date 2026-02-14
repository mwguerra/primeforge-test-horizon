<!DOCTYPE html>
<html>
<head>
    <title>Horizon Test - Job Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Horizon Test - Job Results</h1>
        <div class="mb-4">
            <a href="/dispatch" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Dispatch Job</a>
            <a href="/jobs" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 ml-2">Refresh</a>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Recent Jobs ({{ count($results) }})</h2>
            @forelse($results as $result)
                <div class="border-b py-2">
                    <span class="text-green-600 font-mono">✓</span>
                    {{ $result->message }}
                </div>
            @empty
                <p class="text-gray-500">No jobs processed yet. Click "Dispatch Job" to queue one.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
