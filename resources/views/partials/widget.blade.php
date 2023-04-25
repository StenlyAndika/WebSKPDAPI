<section class="col-md-3 section page-title right-panel">
    <div class="card shadow mb-4">
        <div class="panel-carousel owl-carousel owl-theme">
            <div class="item">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">WALIKOTA<br>KOTA SUNGAI PENUH</h6>
                </div>
                <div class="card-body">
                    <div  class="img-fluid img-responsive center-block"><img style="object-fit: cover; width: 100%; height: 400px;" src="/img/wako.webp"></div>
                    <h5 style="font-size: 18px !important;" class="font-weight-bold m-0 mt-3">Drs. AHMADI ZUBIR, MM</h5>
                </div>
            </div>
            <div class="item">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">WAKIL WALIKOTA<br>KOTA SUNGAI PENUH</h6>
                </div>
                <div class="card-body">
                    <div  class="img-fluid img-responsive center-block"><img style="object-fit: cover; width: 100%; height: 400px;" src="/img/wawako.webp"></div>
                    <h5 style="font-size: 18px !important;" class="font-weight-bold m-0 mt-3">Dr. ALVIA SANTONI, SE, MM</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold">Agenda Kegiatan</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($agenda as $row)
                    <div class="col py-2">
                        @if ($row->tgl == Carbon\Carbon::tomorrow()->toDateString())
                            <div class="card border-primary shadow">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">{{ $row->kegiatan }}</h5>
                                    <div class="text-left text-primary"><i class="bi bi-calendar"></i> {{ Carbon\Carbon::parse($row->tgl)->isoFormat('D-MM-Y') }} (Akan Datang)</div>
                                    <div class="text-left text-primary"><i class="bi bi-clock"></i> {{ $row->jam }} </div>
                                    <div class="text-left"><i class="bi bi-geo-alt-fill"></i> {{ $row->lokasi }} </div>
                                </div>
                            </div>
                        @elseif ($row->tgl == Carbon\Carbon::today()->toDateString())
                            <div class="card border-success shadow">
                                <div class="card-body">
                                    <h5 class="card-title text-success">{{ $row->kegiatan }}</h5>
                                    <div class="text-left text-success"><i class="bi bi-calendar-check-fill"></i> {{ Carbon\Carbon::parse($row->tgl)->isoFormat('D-MM-Y') }} (Hari ini)</div>
                                    <div class="text-left text-success"><i class="bi bi-clock-fill"></i> {{ $row->jam }} </div>
                                    <div class="text-left"><i class="bi bi-geo-alt-fill"></i> {{ $row->lokasi }} </div>
                                </div>
                            </div>
                        @else
                            <div class="card border-danger shadow">
                                <div class="card-body">
                                    <h5 class="card-title text-danger">{{ $row->kegiatan }}</h5>
                                    <div class="text-left text-danger"><i class="bi bi-calendar-check"></i> {{ Carbon\Carbon::parse($row->tgl)->isoFormat('D-MM-Y') }} (Selesai)</div>
                                    <div class="text-left text-danger"><i class="bi bi-clock-history"></i> {{ $row->jam }} </div>
                                    <div class="text-left"><i class="bi bi-geo-alt-fill"></i> {{ $row->lokasi }} </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            {{-- <?php
                $timelinetgl = [];
                $timelinejam = [];
                $timelinekegiatan = [];
                $timelinelokasi = [];
                $i = 0;
                foreach ($agenda as $row) {
                    $timelinetgl[$i] = $row['tgl'];
                    $timelinejam[$i] = $row['jam'];
                    $timelinekegiatan[$i] = $row['kegiatan'];
                    $timelinelokasi[$i] = $row['lokasi'];
                    $i++;
                }
            ?>
            <?php if($timelinetgl[0] != null) { ?>
            <div class="row align-items-center connecting-lines d-flex text-left">
                <div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center">
                    <?php if (strtotime(date('d F Y')) < strtotime(date('d F Y', strtotime($timelinetgl[0])))) : ?>
                        <div class="circle font-weight-bold" style="--colvar : #3E54AC;"><i class="fa fa-check"></i></div>
                    <?php elseif (strtotime(date('d F Y')) == strtotime(date('d F Y', strtotime($timelinetgl[0])))) : ?>
                        <div class="circle font-weight-bold" style="--colvar : #5BB318;"><i class="fa fa-check"></i></div>
                    <?php else : ?>
                        <div class="circle font-weight-bold" style="--colvar : #DC0000;"><i class="fa fa-check"></i></div>
                    <?php endif; ?>
                </div>
                <div class="col-10">
                    <?php if (strtotime(date('d F Y')) < strtotime(date('d F Y', strtotime($timelinetgl[0])))) : ?>
                        <h5 class="font-weight-bold" style="color: #3E54AC;"><?= $this->main->tgl_indo2($timelinetgl[0]); ?></h5>
                        <p>
                            <p style="color: #FF0303 !important;"><i class="fa-solid fa-clock"></i> <?= $timelinejam[0]; ?>&nbsp;<span style="color: #3E54AC !important;">Akan Datang</span></p>
                            <p><i class="fa-regular fa-calendar"></i> <?= $timelinekegiatan[0]; ?></p>
                            <p><i class="fa-solid fa-location-dot"></i> <?= $timelinelokasi[0]; ?></p>
                        </p>
                    <?php elseif (strtotime(date('d F Y')) == strtotime(date('d F Y', strtotime($timelinetgl[0])))) : ?>
                        <h5 class="font-weight-bold" style="color: #5BB318;"><?= $this->main->tgl_indo2($timelinetgl[0]); ?></h5>
                        <p>
                            <p style="color: #FF0303 !important;"><i class="fa-solid fa-clock"></i> <?= $timelinejam[0]; ?>&nbsp;<span style="color: #5BB318 !important;">Hari Ini</span></p>
                            <p><i class="fa-regular fa-calendar"></i> <?= $timelinekegiatan[0]; ?></p>
                            <p><i class="fa-solid fa-location-dot"></i> <?= $timelinelokasi[0]; ?></p>
                        </p>
                    <?php else : ?>
                        <h5 class="font-weight-bold text-muted"><?= $this->main->tgl_indo2($timelinetgl[0]); ?></h5>
                        <p>
                            <p class="text-muted"><i class="fa-solid fa-clock"></i> <?= $timelinejam[0]; ?>&nbsp;<span class="text-muted">Selesai</span></p>
                            <p class="text-muted"><i class="fa-regular fa-calendar"></i> <?= $timelinekegiatan[0]; ?></p>
                            <p class="text-muted"><i class="fa-solid fa-location-dot"></i> <?= $timelinelokasi[0]; ?></p>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Path Line -->
            <div class="row timeline">
                <div class="col-2">
                    <div class="corner top-right"></div>
                </div>
                <div class="col-8">
                    <hr/>
                </div>
                <div class="col-2">
                    <div class="corner left-bottom"></div>
                </div>
            </div>
            <?php } if(!empty($timelinetgl[1])) { ?>
            <!-- Second Content Section-->
            <div class="row align-items-center justify-content-end connecting-lines d-flex">
                <div class="col-10 text-right">
                <?php if (strtotime(date('d F Y')) < strtotime(date('d F Y', strtotime($timelinetgl[1])))) : ?>
                        <h5 class="font-weight-bold" style="color: #3E54AC;"><?= $this->main->tgl_indo2($timelinetgl[1]); ?></h5>
                        <p>
                            <p style="color: #FF0303 !important;"><i class="fa-solid fa-clock"></i> <?= $timelinejam[1]; ?>&nbsp;<span style="color: #3E54AC !important;">Akan Datang</span></p>
                            <p><i class="fa-regular fa-calendar"></i> <?= $timelinekegiatan[1]; ?></p>
                            <p><i class="fa-solid fa-location-dot"></i> <?= $timelinelokasi[1]; ?></p>
                        </p>
                    <?php elseif (strtotime(date('d F Y')) == strtotime(date('d F Y', strtotime($timelinetgl[1])))) : ?>
                        <h5 class="font-weight-bold" style="color: #5BB318;"><?= $this->main->tgl_indo2($timelinetgl[1]); ?></h5>
                        <p>
                            <p style="color: #FF0303 !important;"><i class="fa-solid fa-clock"></i> <?= $timelinejam[1]; ?>&nbsp;<span style="color: #5BB318 !important;">Hari Ini</span></p>
                            <p><i class="fa-regular fa-calendar"></i> <?= $timelinekegiatan[1]; ?></p>
                            <p><i class="fa-solid fa-location-dot"></i> <?= $timelinelokasi[1]; ?></p>
                        </p>
                    <?php else : ?>
                        <h5 class="font-weight-bold text-muted"><?= $this->main->tgl_indo2($timelinetgl[1]); ?></h5>
                        <p>
                            <p class="text-muted"><i class="fa-solid fa-clock"></i> <?= $timelinejam[1]; ?>&nbsp;<span class="text-muted">Selesai</span></p>
                            <p class="text-muted"><i class="fa-regular fa-calendar"></i> <?= $timelinekegiatan[1]; ?></p>
                            <p class="text-muted"><i class="fa-solid fa-location-dot"></i> <?= $timelinelokasi[1]; ?></p>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
                    <?php if (strtotime(date('d F Y')) < strtotime(date('d F Y', strtotime($timelinetgl[1])))) : ?>
                        <div class="circle font-weight-bold" style="--colvar : #3E54AC;"><i class="fa fa-check"></i></div>
                    <?php elseif (strtotime(date('d F Y')) == strtotime(date('d F Y', strtotime($timelinetgl[1])))) : ?>
                        <div class="circle font-weight-bold" style="--colvar : #5BB318;"><i class="fa fa-check"></i></div>
                    <?php else : ?>
                        <div class="circle font-weight-bold" style="--colvar : #DC0000;"><i class="fa fa-check"></i></div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Path Line -->
            <div class="row timeline">
                <div class="col-2">
                    <div class="corner right-bottom"></div>
                </div>
                <div class="col-8">
                    <hr/>
                </div>
                <div class="col-2">
                    <div class="corner top-left"></div>
                </div>
            </div>
            <?php } if(!empty($timelinetgl[2])) { ?>
            <!-- Third Content Section -->
            <div class="row align-items-center connecting-lines d-flex text-left">
                <div class="col-2 text-center top d-inline-flex justify-content-center align-items-center">
                    <?php if (strtotime(date('d F Y')) < strtotime(date('d F Y', strtotime($timelinetgl[2])))) : ?>
                        <div class="circle font-weight-bold" style="--colvar : #3E54AC;"><i class="fa fa-check"></i></div>
                    <?php elseif (strtotime(date('d F Y')) == strtotime(date('d F Y', strtotime($timelinetgl[2])))) : ?>
                        <div class="circle font-weight-bold" style="--colvar : #5BB318;"><i class="fa fa-check"></i></div>
                    <?php else : ?>
                        <div class="circle font-weight-bold" style="--colvar : #DC0000;"><i class="fa fa-check"></i></div>
                    <?php endif; ?>
                </div>
                <div class="col-10">
                <?php if (strtotime(date('d F Y')) < strtotime(date('d F Y', strtotime($timelinetgl[2])))) : ?>
                        <h5 class="font-weight-bold" style="color: #3E54AC;"><?= $this->main->tgl_indo2($timelinetgl[2]); ?></h5>
                        <p>
                            <p style="color: #FF0303 !important;"><i class="fa-solid fa-clock"></i> <?= $timelinejam[2]; ?>&nbsp;<span style="color: #3E54AC !important;">Akan Datang</span></p>
                            <p><i class="fa-regular fa-calendar"></i> <?= $timelinekegiatan[2]; ?></p>
                            <p><i class="fa-solid fa-location-dot"></i> <?= $timelinelokasi[2]; ?></p>
                        </p>
                    <?php elseif (strtotime(date('d F Y')) == strtotime(date('d F Y', strtotime($timelinetgl[2])))) : ?>
                        <h5 class="font-weight-bold" style="color: #5BB318;"><?= $this->main->tgl_indo2($timelinetgl[2]); ?></h5>
                        <p>
                            <p style="color: #FF0303 !important;"><i class="fa-solid fa-clock"></i> <?= $timelinejam[2]; ?>&nbsp;<span style="color: #5BB318 !important;">Hari Ini</span></p>
                            <p><i class="fa-regular fa-calendar"></i> <?= $timelinekegiatan[2]; ?></p>
                            <p><i class="fa-solid fa-location-dot"></i> <?= $timelinelokasi[2]; ?></p>
                        </p>
                    <?php else : ?>
                        <h5 class="font-weight-bold text-muted"><?= $this->main->tgl_indo2($timelinetgl[2]); ?></h5>
                        <p>
                            <p class="text-muted"><i class="fa-solid fa-clock"></i> <?= $timelinejam[2]; ?>&nbsp;<span class="text-muted">Selesai</span></p>
                            <p class="text-muted"><i class="fa-regular fa-calendar"></i> <?= $timelinekegiatan[2]; ?></p>
                            <p class="text-muted"><i class="fa-solid fa-location-dot"></i> <?= $timelinelokasi[2]; ?></p>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <?php } ?> --}}
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">INDEX KEPUASAN MASYARAKAT (IKM)</h6>
        </div>
        <div class="card-body">
            @if(count($kepuasan)<=0)
                <h4 class="small font-weight-bold">Tahun<span class="float-right"></span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            @else
                @foreach($kepuasan as $row)
                    <h4 class="small font-weight-bold">&nbsp; <span class="float-left">Tahun <?= $row['tahun'] ?> - Nilai : {{ $row->nilai }}</span><span class="float-right">{{ $row->predikat }}</span></h4>
                    <div class="progress mb-4">
                        <span class="float-left"></span>
                        <div class="progress-bar @if (round($row->nilai) >= 90) bg-primary @elseif (round($row->nilai) >= 80) bg-success @elseif (round($row->nilai) >= 70) bg-warning @else bg-danger @endif" role="progressbar" style="width: {{ (round($row->nilai)) }}%" aria-valuenow="{{ $row->nilai }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>