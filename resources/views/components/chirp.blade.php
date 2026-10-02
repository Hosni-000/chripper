@props(['chirp'])

<div class="card bg-base-100 shadow mt-4">
    <div class="card-body">
        <div class="flex space-x-3">
            {{-- الصورة الشخصية (مع الاستبدال المحلي) --}}
            @if($chirp->user)
                <div class="avatar placeholder">
                    <div class="bg-neutral text-neutral-content rounded-full w-10 h-10 flex items-center justify-center">
                        <span class="text-xs uppercase font-bold">
                            {{ substr($chirp->user->name, 0, 1) }}
                        </span>
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="bg-neutral text-neutral-content rounded-full w-10 h-10 flex items-center justify-center">
                        <span class="text-xs uppercase font-bold">A</span>
                    </div>
                </div>
            @endif

            <div class="min-w-0 flex-1">
                <div class="flex items-center gap-1">
                    <span class="text-sm font-semibold">
                        {{ $chirp->user ? $chirp->user->name : 'Anonymous' }}
                    </span>
                    <span class="text-base-content/60">·</span>
                    <span class="text-sm text-base-content/60">
                        {{ $chirp->created_at->diffForHumans() }}
                    </span>
                </div>

                <p class="mt-1 text-base">
                    {{ $chirp->message }}
                </p>
            </div>
        </div>
    </div>
</div>
