<div class="section col-lg-12">
    <div class="ticker">
        <div class="title">
            <h5>Berita Terkini</h5>
        </div>
        <div class="news">
            <div class='marquee'>
                <ul style="list-style-type: none;">
                    <li>
                    @foreach ($berita as $row)
                        <a href="{{ route('berita.read', $row->slug) }}">{{ $row->judul }}&emsp;&emsp;&emsp;&emsp;</a>
                    @endforeach
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>