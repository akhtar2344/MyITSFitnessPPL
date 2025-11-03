@foreach ($students as $s)
<section class="col-span-12 md:col-span-9">
  <button onclick="history.back()" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-700 mb-2">
    <span class="text-lg">‹</span> <span class="text-sm">Back to submissions</span>
  </button>

  <h1 class="text-4xl font-extrabold tracking-tight">{{ $s['name'] }}</h1>

  <div class="mt-4 grid grid-cols-12 gap-6">
    <div class="col-span-12 xl:col-span-8 rounded-2xl bg-white border shadow-sm overflow-hidden">
      <div class="p-6">
        <div class="flex flex-wrap items-center justify-between gap-4">
          <div class="flex items-center gap-4">
            <img src="{{ asset($s['proof']) }}"
                 alt="{{ $s['name'] }}"
                 class="w-16 h-16 rounded-full object-cover border shadow-sm select-none">
            <div>
              <div class="text-xl font-semibold">{{ $s['name'] }}</div>
              <div class="text-slate-500 text-sm">NRP {{ $s['nrp'] }}</div>
            </div>
          </div>
          <div class="flex items-center gap-2.5">
            <button class="inline-flex items-center justify-center h-11 px-6 rounded-2xl bg-emerald-500 text-white font-semibold shadow-sm hover:bg-emerald-600 active:translate-y-px">
              Accept
            </button>
            <button class="inline-flex items-center justify-center h-11 px-6 rounded-2xl bg-rose-500 text-white font-semibold shadow-sm hover:bg-rose-600 active:translate-y-px">
              Reject
            </button>
            <button class="inline-flex items-center justify-center h-11 px-6 rounded-2xl border-2 border-amber-400 text-amber-600 font-semibold bg-white hover:bg-amber-50 active:translate-y-px">
              Request Revision
            </button>
          </div>
        </div>

        <div class="mt-6 grid grid-cols-2 gap-y-3 text-sm md:text-base">
          <div class="text-slate-500">Activity:</div><div class="font-medium">{{ $s['activity'] }}</div>
          <div class="text-slate-500">Location:</div><div class="font-medium">{{ $s['location'] }}</div>
          <div class="text-slate-500">Duration:</div><div class="font-medium">{{ $s['duration'] }}</div>
        </div>

        <hr class="my-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <div class="font-semibold mb-3">Proof</div>
            <img src="{{ asset($s['proof']) }}" alt="{{ $s['name'] }} proof"
                 class="max-w-sm w-full h-44 md:h-48 lg:h-52 rounded-xl object-cover border shadow-sm"/>
          </div>
          <div>
            <div class="font-semibold mb-3">Comment</div>
            <p class="text-slate-600">{{ $s['comment'] }}</p>
            <p class="text-slate-400 text-sm mt-1">— {{ $s['reviewer'] }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach
