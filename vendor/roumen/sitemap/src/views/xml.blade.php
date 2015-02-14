{{ '<?xml version="1.0" encoding="UTF-8"?>'."\n" }}
<urlset
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    @foreach($items as $item)
    <url>
        <loc>{{ $item['loc'] }}</loc>
        <priority>{{ $item['priority'] }}</priority>
        <lastmod>{{ date('Y-m-d\TH:i:sP', strtotime($item['lastmod'])) }}</lastmod>
        <changefreq>{{ $item['freq'] }}</changefreq>
        @if(!empty($item['video']))
        <video:video>
            <video:thumbnail_loc>
                http://i1.ytimg.com/vi/{{ str_clean($item['video']->youtubeid) }}/0.jpg
            </video:thumbnail_loc>
            <video:title>
                {{ str_clean($item['video']->title) }}
            </video:title>
            <video:description>
                {{ str_clean($item['video']->excerpt) }}
            </video:description>
            <video:content_loc>
                http://www.youtube.com/v/{{str_clean($item['video']->youtubeid)}}?version=3&amp;f=videos&amp;app=youtube_gdata
            </video:content_loc>
            <video:player_loc allow_embed="yes">
                http://www.youtube.com/watch?v={{str_clean($item['video']->youtubeid)}}&amp;feature=youtube_gdata_player
            </video:player_loc>
            <video:duration>
                {{str_clean($item['video']->duration)}}
            </video:duration>
        </video:video>
        @endif
    </url>
    @endforeach
</urlset>