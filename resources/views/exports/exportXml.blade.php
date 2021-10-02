<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<Authors xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($posts as $author)
        <Author>
            <name>{{ $author->name }}</name>
            <surname>{{ $author->surname }}</surname>
            <fullname>{{ $author->authorFullName }}</fullname>
            <created_at>{{ $author->created_at->tz('UTC')->toAtomString() }}</created_at>
            <books>
                @foreach($author->book as $book)
                    <title>{{ $book->title }}</title>
                    <borrowed>{{ $book->is_borrowed }}</borrowed>
                @endforeach
            </books>
        </Author>
    @endforeach
</Authors>
