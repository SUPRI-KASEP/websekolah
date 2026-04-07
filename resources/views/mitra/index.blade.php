@extends('layouts.app')
@section('title', 'Mitra - SMK YPC')

@section('content')

{{-- Hero Banner --}}
<div style="background: #2c3e50; padding: 3rem 2rem 2.5rem; text-align: center;">
    <h1 style="color: #fff; font-size: 28px; font-weight: 700; margin: 0 0 8px;">Mitra Sekolah</h1>
    <p style="color: #9fb8c9; font-size: 15px; margin: 0;">Kerjasama strategis dengan institusi dan perusahaan terpercaya</p>
    <div style="width: 48px; height: 3px; background: #1abc9c; border-radius: 2px; margin: 14px auto 0;"></div>
    <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.1); border-radius: 20px; padding: 5px 16px; margin-top: 14px;">
        <span style="color: #a8ccd7; font-size: 13px;">Total mitra</span>
        <strong style="color: #fff; font-size: 15px;">{{ $mitras->total() }}</strong>
    </div>
</div>

{{-- Grid Mitra --}}
<div style="padding: 2.5rem 2rem; background: #f4f6f8; min-height: 400px;">
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px;">
        @forelse($mitras as $item)
        <div style="background: #fff; border-radius: 12px; border: 0.5px solid #e0e4ea; overflow: hidden; display: flex; flex-direction: column; transition: box-shadow 0.2s;"
             onmouseover="this.style.boxShadow='0 4px 18px rgba(44,62,80,0.12)'"
             onmouseout="this.style.boxShadow='none'">
            
            {{-- Logo --}}
            <div style="height: 140px; background: #f0f4f7; display: flex; align-items: center; justify-content: center; padding: 16px;">
                @if($item->logo)
                    <img src="{{ $item->logo_url }}" 
                         style="max-height: 100%; max-width: 100%; object-fit: contain;" 
                         alt="{{ $item->nama_mitra }}">
                @else
                    <div style="width: 52px; height: 52px; background: #dce8f0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-handshake" style="color: #7fa8be; font-size: 22px;"></i>
                    </div>
                @endif
            </div>

            {{-- Body --}}
            <div style="padding: 14px 16px 16px; flex: 1; display: flex; flex-direction: column; gap: 6px;">
                <p style="font-size: 14px; font-weight: 700; color: #2c3e50; margin: 0; line-height: 1.4;">
                    {{ $item->nama_mitra }}
                </p>
                <p style="font-size: 12.5px; color: #6b7a8a; margin: 0; line-height: 1.6; flex: 1;">
                    {{ Str::limit($item->deskripsi, 90) }}
                </p>
                <span style="align-self: flex-start; margin-top: 8px; background: #e8f7f3; color: #0f6e56; font-size: 11px; font-weight: 600; padding: 3px 10px; border-radius: 20px;">
                    Mitra
                </span>
            </div>
        </div>
        @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 1rem; color: #8fa3b1;">
            <i class="fas fa-handshake" style="font-size: 56px; color: #bfcfd8; display: block; margin-bottom: 16px;"></i>
            <h3 style="color: #8fa3b1; font-weight: 500;">Belum ada data mitra</h3>
        </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($mitras->hasPages())
    <div style="margin-top: 2.5rem; display: flex; justify-content: center;">
        {{ $mitras->links() }}
    </div>
    @endif
</div>

@endsection