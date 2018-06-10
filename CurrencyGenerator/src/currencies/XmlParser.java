package currencies;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerException;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import java.io.File;
import java.io.IOException;
import java.util.ArrayList;

public class XmlParser {

    private final String FILE_PATH = "C:\\xampp\\htdocs\\TehnologiiWeb\\TWProject\\SpeculAPP\\CurrencyGenerator\\src\\currencies\\generatedValues.xml";

    XmlParser() {
        try {
            DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
            DocumentBuilder docBuilder = docFactory.newDocumentBuilder();

            Document doc = docBuilder.newDocument();
            Element rootElement = doc.createElement("currencies");
            doc.appendChild(rootElement);

            TransformerFactory transformerFactory = TransformerFactory.newInstance();
            Transformer transformer = transformerFactory.newTransformer();
            DOMSource source = new DOMSource(doc);
            StreamResult result = new StreamResult(new File( FILE_PATH ));

            transformer.transform(source, result);

            System.out.println("File saved!");
        } catch (ParserConfigurationException pce) {
            pce.printStackTrace();
        } catch (TransformerException tfe) {
            tfe.printStackTrace();
        }
    }

    void createCurrencyElement( String currency ) {
        try {
            DocumentBuilderFactory docFactory = DocumentBuilderFactory
                    .newInstance();
            DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
            Document doc = docBuilder.parse(new File( FILE_PATH));

            NodeList root = doc.getElementsByTagName("currencies");
            Node currencyName = doc.createElement(currency);
            root.item(0).appendChild(currencyName);

            this.transform(doc);

            System.out.println("Done");

        } catch (ParserConfigurationException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        } catch (TransformerException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        } catch (SAXException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }

    void addValues(String currency , Float currencyVal ) {
        try {
            DocumentBuilderFactory docFactory = DocumentBuilderFactory
                    .newInstance();
            DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
            Document doc = docBuilder.parse(new File( FILE_PATH));

            NodeList currencyName = doc.getElementsByTagName(currency);
            Node value = doc.createElement("value");
            value.appendChild(doc.createTextNode(currencyVal.toString()));
            currencyName.item(0).appendChild(value);

            this.transform(doc);

        } catch (ParserConfigurationException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        } catch (TransformerException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        } catch (SAXException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }

    private void transform(Document document) throws TransformerException {
        TransformerFactory transformerFactory = TransformerFactory
                .newInstance();
        Transformer transformer = transformerFactory.newTransformer();
        DOMSource source = new DOMSource(document);
        StreamResult result = new StreamResult(new File( FILE_PATH ));
        transformer.transform(source, result);
    }

    ArrayList<Float> getValues(String currency) throws IOException, SAXException, ParserConfigurationException {
        DocumentBuilderFactory docFactory = DocumentBuilderFactory
                .newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        Document doc = docBuilder.parse(new File(FILE_PATH));

        NodeList currencyName = doc.getElementsByTagName(currency);
        NodeList nodeValues = currencyName.item(0).getChildNodes();
        ArrayList<Float> list = new ArrayList<Float>();
        for( int i = 0 ; i < nodeValues.getLength(); i++ ) {
            list.add(Float.parseFloat(nodeValues.item(i).getTextContent()));
        }
        return list;
    }
}
