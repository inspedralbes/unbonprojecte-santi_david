<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LlibresTest extends TestCase {

    use RefreshDatabase;

    // Helper function per a insertar un llibre a la base de dades i que retorni la resposta
    private function create_book() {
        return $this->post('/api/llibres', [
            'titol' => 'Un Mundo Feliz',
            'autor' => 'Aldous Huxley',
            'any' => 1932,
            'editorial' => 'Debolsillo',
            'pagines' => 288,
            'isbn' => '978-84-663-5113-8',
            'imatge' => 'https://m.media-amazon.com/images/I/81glRrzOepL._AC_UF894,1000_QL80_.jpg',
            'sinopsis' => 'Un Mundo Feliz es un clásico de la literatura de este siglo...'
        ]);
    }

    // Agafa tots els llibres i comprova que el JSON que retorna té la forma esperada
    public function test_get_all_books(): void {
        $this->create_book();
        $response = $this->get('/api/llibres');
        $response->assertStatus(200);
        $response->assertJsonStructure([['id', 'titol', 'autor', 'any', 'editorial', 'pagines', 'isbn', 'imatge', 'sinopsis']]);
    }

    // Crea un llibre i comprova que el JSON que retorna té la forma esperada i les dades correctes
    public function test_create_book(): void {
        $response = $this->create_book();
        $response->assertStatus(201);
        $response->assertJsonStructure(['id', 'titol', 'autor', 'any', 'editorial', 'pagines', 'isbn', 'imatge', 'sinopsis']);
        // Comprova que el id del llibre és 1 i el titol és el correcte
        $response->assertJsonFragment(['id' => 1]); 
        $response->assertJsonFragment(['titol' => 'Un Mundo Feliz']);
    }

    // Agafa un llibre i comprova que el JSON que retorna té la forma esperada i les dades correctes
    public function test_get_single_book(): void {
        $this->create_book();
        $response = $this->get('/api/llibres/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['id', 'titol', 'autor', 'any', 'editorial', 'pagines', 'isbn', 'imatge', 'sinopsis']);
        // Comprova que el id del llibre és 1 i el titol és el correcte
        $response->assertJsonFragment(['id' => 1]); 
        $response->assertJsonFragment(['titol' => 'Un Mundo Feliz']);
    }

    // Crea un llibre, el modifica i comprova que el JSON que retorna té la forma esperada i les dades correctes
    public function test_update_book(): void {
        $this->create_book();
        $response = $this->put('/api/llibres/1', [
            'titol' => 'Un Mundo MUYY Feliz',
            'autor' => 'Aldous Huxley',
            'any' => 1932,
            'editorial' => 'Debolsillo',
            'pagines' => 288,
            'isbn' => '978-84-663-5113-8',
            'imatge' => 'https://m.media-amazon.com/images/I/81glRrzOepL._AC_UF894,1000_QL80_.jpg',
            'sinopsis' => 'Un Mundo Feliz es un clásico de la literatura de este siglo...'
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure(['id', 'titol', 'autor', 'any', 'editorial', 'pagines', 'isbn', 'imatge', 'sinopsis']);
        $response->assertJsonFragment(['titol' => 'Un Mundo MUYY Feliz']); // Comprova que el títol del llibre és el correcte
    }

    // Crea un llibre i el borra
    public function test_delete_book(): void {
        $this->create_book();                           // Crear llibre
        $response = $this->delete('/api/llibres/1');    // Borrar llibre
        $response->assertStatus(200);
        $response = $this->get('/api/llibres/1');
        $response->assertStatus(404);                   // Comprovar que el llibre ja no existeix
    }
}
