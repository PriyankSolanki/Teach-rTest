import { Button } from 'primereact/button';
interface NavBarProps {
    view: string;
    setView: (view: string) => void; 
  }
const NavBar: React.FC<NavBarProps> = ({view, setView}) => {
  return (
        <div className="container mx-auto">
      <div className="nav flex">
        <button
          className={`buttonProduits ${view === "produits" ? "bg-primary text-white" : ""}`}
          onClick={() => setView("produits")}
        ><strong>Produits</strong></button>
        <button
          className={`buttonCategories ${view === "categories" ? "bg-secondary text-white" : ""}`}
          onClick={() => setView("categories")}
        ><strong>Catégories</strong></button>
      </div>
      </div>
  );
};

export default NavBar;
