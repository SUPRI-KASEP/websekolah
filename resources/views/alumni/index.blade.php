@extends('layouts.app')
@section('title', 'Alumni - SMK YPC')

@section('content')

{{-- Hero --}}
<div style="background: #2c3e50; padding: 3rem 2rem 2.5rem; text-align: center;">
    <h1 style="color: #fff; font-size: 28px; font-weight: 700; margin: 0 0 8px;">Alumni Terhormat</h1>
    <p style="color: #9fb8c9; font-size: 15px; margin: 0;">Kami bangga dengan setiap perjalanan dan prestasi alumni SMK YPC</p>
    <div style="width: 48px; height: 3px; background: #1abc9c; border-radius: 2px; margin: 14px auto 0;"></div>

    <div style="display: inline-flex; gap: 0; background: rgba(255,255,255,0.08); border-radius: 10px; margin-top: 20px; overflow: hidden; border: 0.5px solid rgba(255,255,255,0.15);">
        <div style="padding: 12px 28px; text-align: center; border-right: 0.5px solid rgba(255,255,255,0.12);">
            <span style="color: #1abc9c; font-size: 22px; font-weight: 700; display: block; line-height: 1.2;">{{ $alumni->total() }}</span>
            <span style="color: #9fb8c9; font-size: 11px; letter-spacing: 0.5px;">Total Alumni</span>
        </div>
        <div style="padding: 12px 28px; text-align: center; border-right: 0.5px solid rgba(255,255,255,0.12);">
            <span style="color: #1abc9c; font-size: 22px; font-weight: 700; display: block; line-height: 1.2;">
                {{ $alumni->unique('angkatan')->count() }}
            </span>
            <span style="color: #9fb8c9; font-size: 11px; letter-spacing: 0.5px;">Angkatan</span>
        </div>
        <div style="padding: 12px 28px; text-align: center;">
            <span style="color: #1abc9c; font-size: 22px; font-weight: 700; display: block; line-height: 1.2;">
                {{ $alumni->whereNotNull('pekerjaan_sekarang')->count() }}
            </span>
            <span style="color: #9fb8c9; font-size: 11px; letter-spacing: 0.5px;">Terserap Kerja</span>
        </div>
    </div>
</div>

{{-- Grid --}}
<div style="background: #f4f6f8; padding: 2.5rem 2rem; min-height: 400px;">
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(210px, 1fr)); gap: 20px;">
        @forelse($alumni as $item)
        <div style="background: #fff; border-radius: 12px; border: 0.5px solid #e0e4ea; overflow: hidden; display: flex; flex-direction: column; transition: box-shadow 0.2s;"
             onmouseover="this.style.boxShadow='0 6px 24px rgba(44,62,80,0.12)'"
             onmouseout="this.style.boxShadow='none'">

            {{-- Top accent line --}}
            <div style="height: 4px; background: #1abc9c;"></div>

            {{-- Foto --}}
            <div style="height: 180px; overflow: hidden; background: #eef2f5; display: flex; align-items: center; justify-content: center;">
                @if($item->foto)
                    <img src="{{ Storage::url($item->foto) }}"
                         style="width: 100%; height: 100%; object-fit: cover;"
                         alt="{{ $item->nama_alumni }}"
                         onerror="this.parentElement.innerHTML='<div style=\'display:flex;flex-direction:column;align-items:center;gap:8px\'><div style=\'width:72px;height:72px;border-radius:50%;background:#dce8f0;display:flex;align-items:center;justify-content:center\'><i class=\'fas fa-user-graduate\' style=\'color:#7fa8be;font-size:28px\'></i></div></div>'">
                @else
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 8px;">
                        <div style="width: 72px; height: 72px; border-radius: 50%; background: #dce8f0; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-user-graduate" style="color: #7fa8be; font-size: 28px;"></i>
                        </div>
                        <span style="font-size: 11px; color: #9fb8c9;">
                            {{ collect(explode(' ', $item->nama_alumni))->map(fn($w) => strtoupper(substr($w,0,1)))->take(2)->join('') }}
                        </span>
                    </div>
                @endif
            </div>

            {{-- Body --}}
            <div style="padding: 14px 16px 16px; display: flex; flex-direction: column; gap: 6px; flex: 1;">
                <p style="font-size: 14px; font-weight: 700; color: #2c3e50; margin: 0; line-height: 1.4;">
                    {{ $item->nama_alumni }}
                </p>
                <span style="display: inline-flex; align-items: center; gap: 5px; background: #2c3e50; color: #fff; font-size: 11px; font-weight: 600; padding: 3px 10px; border-radius: 20px; align-self: flex-start;">
                    <i class="fas fa-star" style="color: #1abc9c; font-size: 9px;"></i>
                    Angkatan {{ $item->angkatan }}
                </span>
                @if($item->pekerjaan_sekarang)
                <div style="display: flex; align-items: flex-start; gap: 6px; margin-top: 4px;">
                    <i class="fas fa-briefcase" style="color: #1abc9c; font-size: 11px; margin-top: 2px; flex-shrink: 0;"></i>
                    <span style="font-size: 12px; color: #1abc9c; font-weight: 600; line-height: 1.4;">
                        {{ $item->pekerjaan_sekarang }}
                    </span>
                </div>
                @endif
            </div>
        </div>
        @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 1rem; color: #8fa3b1;">
            <i class="fas fa-users" style="font-size: 56px; color: #bfcfd8; display: block; margin-bottom: 16px;"></i>
            <h3 style="color: #8fa3b1; font-weight: 500;">Belum ada data alumni</h3>
        </div>
        @endforelse
    </div>

    @if($alumni->hasPages())
    <div style="margin-top: 2.5rem; display: flex; justify-content: center;">
        {{ $alumni->links() }}
    </div>
    @endif
</div>

@endsection