const puppeteer = require('puppeteer');
const $ = require('cheerio');
const { fetchProducts, addAlert } = require('./libs/fetch');

const createAlert = ({id}, price) => {
    addAlert(id, price);
}

const checkAllProducts = async () => {
    const browser = await puppeteer.launch();
    const products = await fetchProducts();

    for await (const product of products)
    {
        const productPrice = product.price;
        const scraperBlock = '#' + product.scraper.block_id;

        const page = await browser.newPage();
        await page.goto(product.url);
        const html = await page.evaluate(() => document.body.innerHTML);
        let price = $(scraperBlock, html).text();
        price = Number.parseFloat(price.replace(/[€ ]+/g, ''));

        if(price < productPrice)
        {
            createAlert(product, price);
        }

        await page.close();
    }

    browser.close();
};

checkAllProducts();
