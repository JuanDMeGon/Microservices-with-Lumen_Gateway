<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the books service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the authors service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }

    /**
     * Obtain the full list of book from the book service
     * @return string
     */
    public function obtainBooks()
    {
        return $this->performRequest('GET', '/books');
    }

    /**
     * Create one book using the book service
     * @return string
     */
    public function createBook($data)
    {
        return $this->performRequest('POST', '/books', $data);
    }

    /**
     * Obtain one single book from the book service
     * @return string
     */
    public function obtainBook($book)
    {
        return $this->performRequest('GET', "/books/{$book}");
    }

    /**
     * Update an instance of book using the book service
     * @return string
     */
    public function editBook($data, $book)
    {
        return $this->performRequest('PUT', "/books/{$book}", $data);
    }

    /**
     * Remove a single book using the book service
     * @return string
     */
    public function deleteBook($book)
    {
        return $this->performRequest('DELETE', "/books/{$book}");
    }
}
