<template>
    <div class="container">
        <h1>Llistat de llibres</h1>
        <input type="text" v-model="buscador" placeholder="Cerca un llibre">
        <div class="llibres-container">
            <div class="item" v-for="book in filteredBooks" :key="book.id">
                <h2>{{ book.titol }}</h2>
                <p>{{ book.autor }}</p>
                <p>{{ book.any }}</p>
            </div>
        </div>
        <button>HOLAAAA</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                books: [],
                buscador: '',
            };
        },
        created() {
            this.fetchBooks();
        },
        methods: {
            fetchBooks() {
                let hostname = window.location.hostname;
                let url;

                if(hostname === 'localhost') {
                    url = 'http://'+ hostname +':8000/api/llibres';
                } else {
                    url = 'http://a22sanpujsau.daw.inspedralbes.cat/back/public/api/llibres';
                }
                
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        this.books = data;
                    })
                    .catch(error => {
                        console.error('Error fetching books:', error);
                    });
            }
        },
        computed: {
            filteredBooks() {
                if(this.buscador !== '') {
                    return this.books.filter(book => {
                        return book.titol.toLowerCase().includes(this.buscador.toLowerCase());
                    });
                }
                return this.books;
            }
        }
    }
</script>

<style scoped>
    * {
        font-family: Arial, Helvetica, sans-serif;
        color: #ffffff;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #1D1D1D;
        height: 100vh;
    }

    h1 {
        margin-bottom: 20px;
    }

    .llibres-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #2D2D2D;
        padding: 10px;
        margin: 10px;
        border-radius: 5px;
    }

    input {
        margin-bottom: 20px;
        padding: 10px;
        border-radius: 5px;
        border: none;
        color: black;
    }
</style>