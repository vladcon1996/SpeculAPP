package currencies;

import org.w3c.dom.Document;
import org.w3c.dom.Element;

import javax.jws.WebMethod;
import javax.jws.WebService;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerException;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import java.io.File;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;


@WebService
public class ThreadManager {

    private Map<String,CurrencyThread> currencyThreadList;
    private XmlParser xmlParser;

    public ThreadManager() {
        currencyThreadList = new HashMap<String,CurrencyThread>();
        this.xmlParser = new XmlParser();
    }

    @WebMethod
    public boolean startCurrencyGenerator( String currency, Float intervalBg, Float intervalEnd, Integer time ) {
        if( intervalBg >= intervalEnd || time <= 0 || currencyThreadList.get(currency) != null ) {
            return false;
        }
        CurrencyThread currencyThread = new CurrencyThread(currency, intervalBg , intervalEnd, time, this.xmlParser);
        currencyThread.start();
        currencyThreadList.put(currency, currencyThread);
        System.out.println( currency + " generator created !");
        return true;
    }

    @WebMethod
    public Float getLastValue( String currency ) {
        if( currencyThreadList.get(currency) == null ) {
            return Float.valueOf(-1);
        }
        return currencyThreadList.get(currency).getLastValue();
    }

    @WebMethod
    public ArrayList<Float> getAllValues( String currency ) {
        if( currencyThreadList.get(currency) == null ) {
            return null;
        }
        return currencyThreadList.get(currency).getAllValues();
    }
}
