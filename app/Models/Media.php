<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = [
        'disk',
        'path',
        'filename',
        'mime_type',
        'size',
        'alt_text',
        'uploaded_by',
    ];

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function getUrlAttribute(): string
    {
        if ($this->disk === 'static') {
            return asset($this->path);
        }

        return Storage::disk($this->disk)->url($this->path);
    }

    public static function fromUpload($file, ?string $directory = 'uploads', ?int $uploadedBy = null): self
    {
        $path = $file->store($directory, 'public');

        return self::create([
            'disk' => 'public',
            'path' => $path,
            'filename' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
            'uploaded_by' => $uploadedBy,
        ]);
    }

    public static function fromStaticAsset(string $path, string $filename, ?string $altText = null): self
    {
        return self::create([
            'disk' => 'static',
            'path' => $path,
            'filename' => $filename,
            'mime_type' => null,
            'size' => 0,
            'alt_text' => $altText,
        ]);
    }
}
