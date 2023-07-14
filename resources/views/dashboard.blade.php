@extends('layouts.main')

@section('content')
    <div class="">
    
  <!-- Component Start -->
	<div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 w-full max-w-6xl">
		<div class="flex items-center p-4 bg-white rounded-xl border">
			<div class="flex flex-shrink-0 items-center justify-center bg-blue-300 h-16 w-16 rounded">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
                  </svg>
                  
			</div>
			<div class="flex-grow flex flex-col ml-4">
				<span class="text-xl font-bold">{{ $data['wallet'] }} {{ options('currency') }}</span>
				<div class="flex items-center justify-between">
					<span class="text-gray-500">Wallet Amount</span>
					{{-- <span class="text-green-500 text-sm font-semibold ml-2">+12.6%</span> --}}
				</div>
			</div>
		</div>

		<div class="flex items-center p-4 bg-white rounded-xl border">
			<div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
				<svg class="w-6 h-6 fill-current text-green-700"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				  <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
				</svg>
			</div>
			<div class="flex-grow flex flex-col ml-4">
				<span class="text-xl font-bold">{{ $data['income'] }} {{ options('currency') }}</span>
				<div class="flex items-center justify-between">
					<span class="text-gray-500">Income Current Month</span>
					{{-- <span class="text-green-500 text-sm font-semibold ml-2">+12.6%</span> --}}
				</div>
			</div>
		</div>

        <div class="flex items-center p-4 bg-white rounded-xl border">
			<div class="flex flex-shrink-0 items-center justify-center bg-red-200 h-16 w-16 rounded">
				<svg class="w-6 h-6 fill-current text-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				  <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
				</svg>
			</div>
			<div class="flex-grow flex flex-col ml-4">
				<span class="text-xl font-bold">{{ $data['expense'] }} {{ options('currency') }}</span>
				<div class="flex items-center justify-between">
					<span class="text-gray-500">Expense Current Month</span>
					{{-- <span class="text-green-500 text-sm font-semibold ml-2">+12.6%</span> --}}
				</div>
			</div>
		</div>

	</div>
	<!-- Component End  -->

    <div class="w-full py-5">
        <h2>Current Year Transaction</h2>
        <canvas id="myChart" data-analytics="{{ json_encode($analytics) }}"></canvas>
    </div>
    
    </div>

@endsection

{{-- @push('script')
    <script>
        const analytics = document.getElementById('myChart').dataset.analytics;
        console.log(JSON.parse(analytics))
    </script>
@endpush --}}