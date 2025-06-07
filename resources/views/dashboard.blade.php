<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 dark:text-red-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <!-- <div class="bg-white dark:bg-red-800 overflow-hidden shadow rounded-lg border-2 border-white">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Total Users</h3>
                        <p class="mt-2 text-3xl font-bold text-gray-800 dark:text-gray-200">123</p>
                    </div>
                </div> -->
                <!-- Card 2 -->
                <!-- <div class="bg-white dark:bg-red-800 overflow-hidden shadow rounded-lg border-2 border-white">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Active Projects</h3>
                        <p class="mt-2 text-3xl font-bold text-gray-800 dark:text-gray-200">8</p>
                    </div>
                </div> -->
                <!-- Card 3 -->
                <!-- <div class="bg-white dark:bg-red-800 overflow-hidden shadow rounded-lg border-2 border-white">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Tasks Completed</h3>
                        <p class="mt-2 text-3xl font-bold text-gray-800 dark:text-gray-200">56</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    @if (auth()->user()->role !== 'job_seeker')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                 @foreach($employers as $employer)
                    <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 border-b pb-2 mb-4">
                        {{ $employer->judul_pekerjaan }}
                    </h3>
                    <div class="space-y-3">
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Deskripsi:</span>
                            {{ $employer->deskripsi }}
                        </p>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Gaji:</span>
                            Rp {{ number_format($employer->kisaran_gaji, 0, ',', '.') }}
                        </p>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Dibuka:</span>
                            {{ $employer->tanggal_posting }}
                        </p>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Ditutup:</span>
                            {{ $employer->tanggal_hingga }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if (auth()->user()->role !== 'job_seeker')
    <div class="py-12">
        <form action="{{route('register-job')}}" method="POST" class="max-w-xl mx-auto bg-white dark:bg-red-800 p-8 rounded-lg shadow-md border-2 border-white">
        <!-- <form action="" method="POST" class="max-w-xl mx-auto bg-white dark:bg-red-800 p-8 rounded-lg shadow-md border-2 border-white"> -->
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Input Pekerjaan :</h3>
            <hr>
            @csrf
            <div class="mb-4">
                <label for="judul_pekerjaan" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Judul Pekerjaan</label>
                <input type="text" name="judul_pekerjaan" id="judul_pekerjaan" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="deskripsi_pekerjaan" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Deskripsi Pekerjaan</label>
                <textarea name="deskripsi_pekerjaan" id="deskripsi_pekerjaan" class="w-full px-3 py-2 border rounded" rows="4" required></textarea>
            </div>
            <div class="mb-4">
                <label for="lokasi" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="kisaran_gaji" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Kisaran Gaji</label>
                <input type="text" name="kisaran_gaji" id="kisaran_gaji" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="tanggal_posting" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Tanggal Posting</label>
                <input type="date" name="tanggal_posting" id="tanggal_posting" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="berlaku_hingga" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Berlaku Hingga</label>
                <input type="date" name="berlaku_hingga" id="berlaku_hingga" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-red-700 text-white px-6 py-2 rounded hover:bg-red-900">Simpan</button>
            </div>
        </form>
    </div>
    @endif

    @if (auth()->user()->role !== 'employer')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                 @foreach($employers as $employer)
                <a href="{{route('list_seekers.update')}}" class="block bg-white dark:bg-red-800 overflow-hidden shadow rounded-lg border-2 border-white transition transform hover:scale-105 hover:shadow-lg">
                    <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 border-b pb-2 mb-4">
                        {{ $employer->judul_pekerjaan }}
                    </h3>
                    <div class="space-y-3">
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Deskripsi:</span>
                            {{ $employer->deskripsi }}
                        </p>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Gaji:</span>
                            Rp {{ number_format($employer->kisaran_gaji, 0, ',', '.') }}
                        </p>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Dibuka:</span>
                            {{ $employer->tanggal_posting }}
                        </p>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Ditutup:</span>
                            {{ $employer->tanggal_hingga }}
                        </p>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    
</x-app-layout>
