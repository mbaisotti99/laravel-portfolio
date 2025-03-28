<style>
    header{
        height: 150px;
        width: 100%;
        background-color: #1c5c91;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<header>
    <a href="<?= Auth::check() ? route('dashboard') : "/" ?>">
        <img src="/head.png" alt="MyPortfolio" width="500">
    </a>
</header>