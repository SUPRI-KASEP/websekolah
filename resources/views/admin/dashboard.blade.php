@extends('Layouts-Admin.app')
@section('title', 'Admin')
@section('content')

    @php
        $profilCount = \App\Models\profil::count();
        $eskulCount = \App\Models\Eskul::count();
        $fasilitasCount = \App\Models\Fasilitas::count();
        $prestasiCount = \App\Models\Prestasi::count();
        $pesanCount = \App\Models\Pesan::count();

        $pesans = \App\Models\Pesan::orderBy('created_at', 'desc')->limit(5)->get();

        $statData = [
            ['name' => 'Profil',    'count' => $profilCount,   'icon' => '👤'],
            ['name' => 'Eskul',     'count' => $eskulCount,    'icon' => '🏋'],
            ['name' => 'Fasilitas', 'count' => $fasilitasCount,'icon' => '🏠'],
            ['name' => 'Prestasi',  'count' => $prestasiCount, 'icon' => '🏆'],
            ['name' => 'Pesan',     'count' => $pesanCount,    'icon' => '💬'],
        ];
    @endphp

    {{-- ══════════════════════════════════════════
         STAT CARDS — horizontal scroll on mobile
    ══════════════════════════════════════════ --}}
    <div class="stat-scroll-wrapper">
        <div class="stat-card">
            @foreach($statData as $stat)
            <div class="stat-item">
                <div class="stat-icon">{!! $stat['icon'] !!}</div>
                <div class="stat-info">
                    <span class="stat-count">{{ $stat['count'] }}</span>
                    <span class="stat-name">{{ $stat['name'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         WIDGET ROW — horizontal scroll on mobile
    ══════════════════════════════════════════ --}}
    <div class="parent-scroll-wrapper">
        <div class="parent">

            {{-- Chart --}}
            <div class="widget-card div4">
                <div class="chart-widget">
                    <div class="widget-header">
                        <span class="widget-title">Data Menu</span>
                        <span class="widget-subtitle">Statistik Menu Website</span>
                    </div>
                    <div class="chart-content">
                        <div class="pie-chart-container">
                            @php
                                $menuData = [
                                    ['name' => 'Profil',    'count' => $profilCount,    'color' => '#FF6384'],
                                    ['name' => 'Eskul',     'count' => $eskulCount,     'color' => '#36A2EB'],
                                    ['name' => 'Fasilitas', 'count' => $fasilitasCount, 'color' => '#FFCE56'],
                                    ['name' => 'Prestasi',  'count' => $prestasiCount,  'color' => '#4BC0C0'],
                                    ['name' => 'Pesan',     'count' => $pesanCount,     'color' => '#9966FF'],
                                ];
                                $total = array_sum(array_column($menuData, 'count'));
                                $startAngle = 0;
                                $segments = [];
                                foreach ($menuData as $menu) {
                                    $percentage = $total > 0 ? ($menu['count'] / $total) * 100 : 0;
                                    $angle = ($percentage / 100) * 360;
                                    $segments[] = [
                                        'name'       => $menu['name'],
                                        'count'      => $menu['count'],
                                        'percentage' => round($percentage, 1),
                                        'color'      => $menu['color'],
                                        'startAngle' => $startAngle,
                                        'endAngle'   => $startAngle + $angle,
                                    ];
                                    $startAngle += $angle;
                                }
                            @endphp

                            <div class="pie-chart" style="background: conic-gradient(
                                @foreach($segments as $index => $seg)
                                    {{ $seg['color'] }} {{ $seg['startAngle'] }}deg {{ $seg['endAngle'] }}deg{{ $index < count($segments) - 1 ? ',' : '' }}
                                @endforeach
                            );"></div>

                            <div class="pie-center">
                                <span class="pie-total">{{ $total }}</span>
                                <span class="pie-label">Total</span>
                            </div>
                        </div>

                        <div class="chart-legend">
                            @foreach($segments as $seg)
                            <div class="legend-item">
                                <span class="legend-color" style="background-color: {{ $seg['color'] }};"></span>
                                <span class="legend-name">{{ $seg['name'] }}</span>
                                <span class="legend-count">{{ $seg['count'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Calendar --}}
            <div class="widget-card div5">
                <div class="widget-header">
                    <span class="widget-title">Pengaturan</span>
                    <span class="widget-subtitle">Kalender &amp; Aktivitas</span>
                </div>
                <div class="calendar-mini">
                    <div class="calendar-nav">
                        <span class="nav-arrow">&lt;</span>
                        <span class="current-month">{{ date('F Y') }}</span>
                        <span class="nav-arrow">&gt;</span>
                    </div>
                    <div class="calendar-grid">
                        @foreach(['S','S','R','K','J','S','M'] as $h)
                            <div class="day-header">{{ $h }}</div>
                        @endforeach
                        @php
                            $currentDay      = date('j');
                            $currentMonth    = date('n');
                            $currentYear     = date('Y');
                            $firstDay        = mktime(0,0,0,$currentMonth,1,$currentYear);
                            $dayOfWeek       = date('w', $firstDay);
                            $daysInMonth     = date('t', $firstDay);
                        @endphp
                        @for($i = 0; $i < $dayOfWeek; $i++)
                            <div class="day-cell"></div>
                        @endfor
                        @for($day = 1; $day <= $daysInMonth; $day++)
                            <div class="day-cell {{ $day == $currentDay ? 'today' : '' }}">{{ $day }}</div>
                        @endfor
                    </div>
                </div>
                <div class="activity-list">
                    <div class="activity-title">Daftar Aktivitas</div>
                    <div class="activity-item">
                        <div class="activity-date">{{ date('d') }}</div>
                        <div class="activity-info">
                            <div class="activity-name">Hari Ini</div>
                            <div class="activity-desc">Aktivitas sekolah</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Messages --}}
            <div class="widget-card div6">
                <div class="widget-header">
                    <span class="widget-title">Pesan Masuk</span>
                    <span class="widget-subtitle">Email &amp; Pesan Terbaru</span>
                </div>
                <div class="message-content">
                    @if($pesans->count() > 0)
                        @foreach($pesans as $pesan)
                        <div class="message-item">
                            <div class="message-icon">✉</div>
                            <div class="message-info">
                                <div class="message-email">{{ $pesan->email }}</div>
                                <div class="message-text">{{ Str::limit($pesan->pesan, 50) }}</div>
                                <div class="message-time">{{ $pesan->created_at->format('d/m/Y') }}</div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="message-empty">Belum ada pesan masuk</div>
                    @endif
                </div>
            </div>

        </div>{{-- .parent --}}
    </div>{{-- .parent-scroll-wrapper --}}

    <style>
        /* ─────────────────────────────────────────
           BASE RESET / BOX-SIZING
        ───────────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; }

        /* ─────────────────────────────────────────
           STAT ROW — horizontal scroll wrapper
        ───────────────────────────────────────── */
        .stat-scroll-wrapper {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: 10px 10px 4px 10px;
            /* hide scrollbar visually but keep functional */
            scrollbar-width: thin;
            scrollbar-color: #ccc transparent;
        }
        .stat-scroll-wrapper::-webkit-scrollbar { height: 4px; }
        .stat-scroll-wrapper::-webkit-scrollbar-thumb { background: #ccc; border-radius: 2px; }

        .stat-card {
            display: flex;               /* single row, never wraps */
            flex-wrap: nowrap;
            gap: 10px;
            /* each card fixed width so they don't shrink into nothing */
            min-width: max-content;
        }

        .stat-item {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 130px;           /* readable on small screens */
            flex-shrink: 0;
        }

        .stat-icon {
            width: 35px; height: 35px;
            background: #f5f5f5;
            border-radius: 6px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .stat-info { display: flex; flex-direction: column; }

        .stat-count {
            font-size: 1.1rem; font-weight: 700;
            color: #333; line-height: 1.2;
        }

        .stat-name {
            font-size: 0.65rem; color: #666;
            text-transform: uppercase; letter-spacing: 0.5px;
            white-space: nowrap;
        }

        /* ─────────────────────────────────────────
           WIDGET ROW — horizontal scroll wrapper
        ───────────────────────────────────────── */
        .parent-scroll-wrapper {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: 4px 10px 10px 10px;
            scrollbar-width: thin;
            scrollbar-color: #ccc transparent;
        }
        .parent-scroll-wrapper::-webkit-scrollbar { height: 4px; }
        .parent-scroll-wrapper::-webkit-scrollbar-thumb { background: #ccc; border-radius: 2px; }

        .parent {
            display: flex;
            flex-wrap: nowrap;
            gap: 8px;
            min-width: max-content;     /* prevents collapsing */
        }

        /* each widget card */
        .widget-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            /* Fixed widths so each card is usable on mobile */
            width: 280px;
            flex-shrink: 0;
            min-height: 300px;
            display: flex;
            flex-direction: column;
        }

        /* On larger screens: let them stretch equally */
        @media (min-width: 900px) {
            .parent {
                flex-wrap: nowrap;
                min-width: unset;
            }
            .widget-card {
                width: unset;
                flex: 1 1 0;
            }
            /* hide scroll hint on desktop */
            .parent-scroll-wrapper,
            .stat-scroll-wrapper {
                overflow-x: hidden;
            }
        }

        /* ─────────────────────────────────────────
           WIDGET HEADER (shared)
        ───────────────────────────────────────── */
        .widget-header {
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
            margin-bottom: 12px;
        }
        .widget-title {
            display: block; font-size: 1rem;
            font-weight: 600; color: #333;
        }
        .widget-subtitle {
            display: block; font-size: 0.75rem;
            color: #666; margin-top: 2px;
        }

        /* ─────────────────────────────────────────
           PIE CHART
        ───────────────────────────────────────── */
        .chart-widget { display: flex; flex-direction: column; height: 100%; }

        .chart-content {
            flex-grow: 1;
            display: flex; flex-direction: column; align-items: center;
        }

        .pie-chart-container {
            position: relative;
            width: 130px; height: 130px;
            margin-bottom: 14px;
        }
        .pie-chart {
            width: 100%; height: 100%;
            border-radius: 50%;
        }
        .pie-center {
            position: absolute; top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 58px; height: 58px;
            background: #fff; border-radius: 50%;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .pie-total  { font-size: 1.1rem; font-weight: bold; color: #333; line-height: 1; }
        .pie-label  { font-size: 0.6rem; color: #666; text-transform: uppercase; }

        .chart-legend { width: 100%; display: flex; flex-direction: column; gap: 5px; }
        .legend-item {
            display: flex; align-items: center;
            padding: 5px 8px; background: #f9f9f9; border-radius: 4px;
        }
        .legend-color {
            width: 11px; height: 11px; border-radius: 3px;
            margin-right: 7px; flex-shrink: 0;
        }
        .legend-name { flex-grow: 1; font-size: 0.72rem; color: #333; }
        .legend-count {
            font-size: 0.72rem; font-weight: 600; color: #666;
            background: #eee; padding: 2px 7px; border-radius: 10px;
        }

        /* ─────────────────────────────────────────
           MINI CALENDAR
        ───────────────────────────────────────── */
        .calendar-mini {
            margin-bottom: 12px; padding-bottom: 12px;
            border-bottom: 1px solid #eee;
        }
        .calendar-nav {
            display: flex; justify-content: space-between;
            align-items: center; margin-bottom: 8px;
        }
        .nav-arrow { cursor: pointer; color: #666; font-weight: bold; user-select: none; }
        .current-month { font-size: 0.82rem; font-weight: 600; color: #333; }

        .calendar-grid {
            display: grid; grid-template-columns: repeat(7, 1fr);
            gap: 2px; text-align: center;
        }
        .day-header { font-size: 0.62rem; font-weight: 600; color: #888; padding: 3px 0; }
        .day-cell   { font-size: 0.68rem; padding: 4px 2px; color: #333; border-radius: 3px; }
        .day-cell.today { background: #333; color: #fff; font-weight: bold; }

        /* ─────────────────────────────────────────
           ACTIVITY LIST
        ───────────────────────────────────────── */
        .activity-list { margin-top: 4px; }
        .activity-title { font-size: 0.78rem; font-weight: 600; color: #333; margin-bottom: 8px; }
        .activity-item {
            display: flex; align-items: center;
            padding: 8px; background: #f9f9f9;
            border-radius: 5px; margin-bottom: 6px;
        }
        .activity-date {
            width: 34px; height: 34px; background: #eee;
            border-radius: 5px; display: flex;
            align-items: center; justify-content: center;
            font-size: 0.78rem; font-weight: 600;
            color: #333; margin-right: 10px; flex-shrink: 0;
        }
        .activity-info { flex-grow: 1; }
        .activity-name { font-size: 0.73rem; font-weight: 600; color: #333; }
        .activity-desc { font-size: 0.63rem; color: #666; }

        /* ─────────────────────────────────────────
           MESSAGE LIST
        ───────────────────────────────────────── */
        .message-content { flex-grow: 1; overflow-y: auto; }
        .message-item {
            display: flex; align-items: flex-start;
            padding: 10px; background: #f9f9f9;
            border-radius: 6px; margin-bottom: 7px;
        }
        .message-icon {
            width: 30px; height: 30px; background: #e0e0e0;
            border-radius: 50%; display: flex;
            align-items: center; justify-content: center;
            font-size: 0.78rem; margin-right: 10px; flex-shrink: 0;
        }
        .message-info  { flex-grow: 1; min-width: 0; }
        .message-email {
            font-size: 0.73rem; font-weight: 600; color: #333;
            margin-bottom: 2px; overflow: hidden;
            text-overflow: ellipsis; white-space: nowrap;
        }
        .message-text  { font-size: 0.68rem; color: #666; margin-bottom: 3px; line-height: 1.4; }
        .message-time  { font-size: 0.6rem; color: #999; }
        .message-empty { text-align: center; padding: 20px; color: #666; font-size: 0.82rem; }

        /* ─────────────────────────────────────────
           SCROLL HINT INDICATOR (mobile only)
           — subtle fade on the right edge
        ───────────────────────────────────────── */
        @media (max-width: 899px) {
            .stat-scroll-wrapper,
            .parent-scroll-wrapper {
                position: relative;
            }
            /* Faint right-edge fade so users know it scrolls */
            .stat-scroll-wrapper::after,
            .parent-scroll-wrapper::after {
                content: '';
                position: sticky;
                right: 0;
                top: 0;
                display: block;
                width: 28px;
                min-width: 28px;
                height: 100%;
                background: linear-gradient(to right, transparent, rgba(255,255,255,0.85));
                pointer-events: none;
                flex-shrink: 0;
            }
        }
    </style>

@endsection