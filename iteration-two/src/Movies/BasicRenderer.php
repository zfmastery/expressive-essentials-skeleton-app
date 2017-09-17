<?php

namespace Movies;

class BasicRenderer
{
    const HEADER = '<tr>
<th>Title</th>
<th>Director</th>
<th>Release Date</th>
<th>Stars</th>
<th>Synopsis</th>
<th>Genre</th>
</tr>';

    const BODY_TEMPLATE = '<tr>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
</tr>';

    public function __invoke($movieData)
    {
        $tableBody = '';

        foreach ($movieData as $movie) {
            $tableBody .= sprintf(
                self::BODY_TEMPLATE,
                $movie['title'],
                $movie['director'],
                (new \DateTime($movie['release_date']))->format('d/M/Y'),
                implode(', ', $movie['stars']),
                $movie['synopsis'],
                implode(', ', $movie['genre'])
            );
        }

        return sprintf(
            '<h1>%s</h1><table style="padding:5px;">%s%s</table>',
            'PHP Movie Database',
            self::HEADER,
            $tableBody
        );
    }
}
