<template>
    <div class="landing">
        <h1>Bienvenido a la página de inicio</h1>
        <p>Esta es una hermosa página de inicio.</p>
        <router-link to="/llistat">Ir a Llistat</router-link>
    </div>
</template>

<script>
export default {
    
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
.landing {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    text-align: center;
    background-color: #1D1D1D;
}

h1 {
    font-size: 32px;
}

p {
    font-size: 18px;
}

router-link {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

router-link:hover {
    background-color: #0056b3;
}
</style>
