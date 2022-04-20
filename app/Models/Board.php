<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Board extends TileContainer
{
    use HasFactory;

    protected $table = 'boards';

    // allow these properties to be passed to create()
    protected $fillable = [
        'name',
        'height',
        'width'
    ];

    // show these properties during JSON serialization
    protected $visible = [
        'name',
        'height',
        'width',
        'id',
        'contents' // defined by `getContentsAttribute`
    ];

    // default values for these properties
    protected $attributes = [
        'width' => 7,
        'height' => 5
    ];

    public function words()
    {
        return $this->belongsToMany(
            Word::class,
        )->withPivot('board_x', 'board_y');
    }

    public function folders()
    {
        return $this->belongsToMany(
            Folder::class,
        )->withPivot('board_x', 'board_y');
    }

    public function swapItems($rowA, $columnA, $rowB, $columnB)
    {
        ///todo
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exportToObf(): array
    {
        $images = $this->tiles()
            ->filter( function($tile): bool {
                return (bool) $tile->icon;
            })
            ->map( function($tile): array {
                return [
                    'id' => (string) $tile->id,
                    'url' => $tile->icon,
                    'height' => "76",
                    'width' => "76",
                    'content_type' => $tile->icon
                        ? 'image/' . substr(strrchr($tile->icon, '.'), 1)
                        : null,
                ];
            })->values();

        $buttons = $this->tiles()->map( function($tile): array {
            return [
                // hack: folders and words share the same id space, so just make
                // folder ids negative to prevent collisions
                'id' => (string) ($tile->name ? -$tile->id : $tile->id),
                'label' => $tile->name ?? $tile->text,
                'border_color' => 'rbg(0, 0, 0)',
                'background_color' => $tile->color,
                'image_id' => (string) $tile->id
            ];
        })->values();

        $grid_order = [];

        for ($y = 1; $y <= $this->height; $y++) {
            for ($x = 1; $x <= $this->width; $x++) {
                (string) $grid_order[$y][$x] = $this->tiles()
                    ->where('pivot.board_x', $x)
                    ->firstWhere('pivot.board_y', $y)
                    ?->id;
            }

            $grid_order[$y] = array_values($grid_order[$y]);
        }

        $grid_order = array_values($grid_order);

        $grid = [
            'rows' => $this->height,
            'columns' => $this->width,
            'order' => $grid_order
        ];

        return [
            'format' => 'open-board-0.1',
            'locale' => 'en',
            'id' => (string) $this->id,
            'url' => url("/boards/{$this->id}"),
            'name' => $this->name,
            'description' => 'Board created by Project Lucy',
            'images' => $images,
            'buttons' => $buttons,
            'grid' => $grid,
            'sounds' => []
        ];
    }
}
