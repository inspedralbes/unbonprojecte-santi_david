<template>
    <div class="container">
        <h1>Llistat de llibres</h1>
        <ul>
            <li v-for="book in books" :key="book.id">
                {{ book.title }}
                <ul>
                    <li>-{{ book.author }}</li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                books: [
                    {
                        id: 1,
                        title: 'Book 1',
                        author: 'Author 1'

                    },
                    {
                        id: 2,
                        title: 'Book 2',
                        author: 'Author 2'
                    },
                    {
                        id: 3,
                        title: 'Book 3',
                        author: 'Author 3'
                    },
                    {
                        id: 4,
                        title: 'Book 4',
                        author: 'Author 4'
                    },
                    {
                        id: 5,
                        title: 'Book 5',
                        author: 'Author 5'
                    },
                    {
                        id: 6,
                        title: 'Book 6',
                        author: 'Author 6'
                    },
                    {
                        id: 7,
                        title: 'Book 7',
                        author: 'Author 7'
                    },
                    {
                        id: 8,
                        title: 'Book 8',
                        author: 'Author 8'
                    },
                    {
                        id: 9,
                        title: 'Book 9',
                        author: 'Author 9'
                    },
                    {
                        id: 10,
                        title: 'Book 10',
                        author: 'Author 10'
                    }
                ]
            };
        },
        created() {
            this.fetchBooks();
        },
        methods: {
            fetchBooks() {
                const url = 'localhost:8000/api/llibres';
                fetch('url')
                    .then(response => response.json())
                    .then(data => {
                        this.books = data;
                    })
                    .catch(error => {
                        console.error('Error fetching books:', error);
                    });
            }
        }
    }
</script>

<style scoped>
    *{
        font-family:
        Inter,
        -apple-system,
        BlinkMacSystemFont,
        'Segoe UI',
        Roboto,
        Oxygen,
        Ubuntu,
        Cantarell,
        'Fira Sans',
        'Droid Sans',
        'Helvetica Neue',
        sans-serif;
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
        font-size: 24px;
        margin-bottom: 10px;
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    li {
        font-size: 16px;
        margin-bottom: 5px;
    }
</style>