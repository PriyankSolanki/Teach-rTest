import {useState} from 'react';
import {Button} from 'primereact/button';
import ProductTable from "./produits";
import NavBar from './navBar';
import Logo from './logo';

export default function Home() {
  const [view, setView] = useState("produits");

  return (
    <>
      <Logo/>
      <NavBar view={view} setView={setView}/>
      {view === "produits" && <ProductTable />}
      {view === "categories" && <Logo />}
    </>
  );
}


