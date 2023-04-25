<div class="section col-lg-12">
    <div class="ticker d-flex flex-wrap">
        <div class="title rounded-left">
            <h5>Berita Terkini</h5>
        </div>
        <div class="news rounded-right">
            <ul class="marquee" style="list-style-type: none;">
                <li>
                @foreach ($berita as $row)
                    <a href="{{ route('berita.read', $row->slug) }}">{{ $row->judul }}&emsp;&emsp;&emsp;&emsp;</a>
                @endforeach
                </li>
            </ul>
        </div>
    </div>
</div>