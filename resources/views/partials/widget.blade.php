<section class="col-md-3 section right-panel">
    <div class="card shadow mb-4 text-center">
        <div class="item">
            <div class="card-header">
                <h6 class="m-0 fw-bold">KEPALA INSTANSI</h6>
            </div>
            <div class="card-body">
                <div  class="img-fluid img-responsive center-block"><img style="object-fit: cover; width: 100%; height: 400px;" src="@if ($profil) {{ asset('storage/'.$profil->fotokepala) }} @else /img/avatar.webp @endif"></div>
                <h5 style="font-size: 18px !important;" class="fw-bold m-0 mt-3 ">@if ($profil) {{ $profil->kepala }} @else Nama Kepala Instansi @endif</h5>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="m-0 fw-bold">Agenda Kegiatan</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($agenda as $row)
                    <div class="py-2">
                        @if ($row->tgl == Carbon\Carbon::tomorrow()->toDateString())
                            <div class="card border-primary shadow">
                                <div class="card-body">
                                    <h5 class="card-title text-primary text-center">{{ $row->kegiatan }}</h5>
                                    <div class="text-primary"><i class="bi bi-calendar"></i> {{ Carbon\Carbon::parse($row->tgl)->isoFormat('D-MM-Y') }} (Akan Datang)</div>
                                    <div class="text-primary"><i class="bi bi-clock"></i> {{ $row->jam }} </div>
                                    <div class=""><i class="bi bi-geo-alt-fill"></i> {{ $row->lokasi }} </div>
                                </div>
                            </div>
                        @elseif ($row->tgl == Carbon\Carbon::today()->toDateString())
                            <div class="card border-success shadow">
                                <div class="card-body">
                                    <h5 class="card-title text-success text-center">{{ $row->kegiatan }}</h5>
                                    <div class="text-success"><i class="bi bi-calendar-check-fill"></i> {{ Carbon\Carbon::parse($row->tgl)->isoFormat('D-MM-Y') }} (Hari ini)</div>
                                    <div class="text-success"><i class="bi bi-clock-fill"></i> {{ $row->jam }} </div>
                                    <div class=""><i class="bi bi-geo-alt-fill"></i> {{ $row->lokasi }} </div>
                                </div>
                            </div>
                        @else
                            <div class="card border-danger shadow">
                                <div class="card-body">
                                    <h5 class="card-title text-danger text-center">{{ $row->kegiatan }}</h5>
                                    <div class="text-danger"><i class="bi bi-calendar-check"></i> {{ Carbon\Carbon::parse($row->tgl)->isoFormat('D-MM-Y') }} (Selesai)</div>
                                    <div class="text-danger"><i class="bi bi-clock-history"></i> {{ $row->jam }} </div>
                                    <div class=""><i class="bi bi-geo-alt-fill"></i> {{ $row->lokasi }} </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="m-0 fw-bold">INDEX KEPUASAN MASYARAKAT (IKM)</h6>
        </div>
        <div class="card-body">
            @if(count($kepuasan)<=0)
                <h4 class="small fw-bold">Tahun<span class="float-right"></span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            @else
                @foreach($kepuasan as $row)
                    <h4 class="small fw-bold">&nbsp; <span class="float-left">Tahun <?= $row['tahun'] ?> - Nilai : {{ $row->nilai }}</span><span class="float-right"> {{ $row->predikat }}</span></h4>
                    <div class="progress mb-4">
                        <span class="float-left"></span>
                        <div class="progress-bar @if (round($row->nilai) >= 90) bg-primary @elseif (round($row->nilai) >= 80) bg-success @elseif (round($row->nilai) >= 70) bg-warning @else bg-danger @endif" role="progressbar" style="width: {{ (round($row->nilai)) }}%" aria-valuenow="{{ $row->nilai }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>