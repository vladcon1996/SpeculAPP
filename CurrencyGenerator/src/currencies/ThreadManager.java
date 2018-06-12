package currencies;

import javax.jws.WebMethod;
import javax.jws.WebService;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;


@WebService
public class ThreadManager {

    private Map<Integer,CurrencyThread> currencyThreadList;
    private XmlParser xmlParser;

    public ThreadManager() {
        currencyThreadList = new HashMap<Integer, CurrencyThread>();
        this.xmlParser = new XmlParser();
    }

    @WebMethod
    public boolean startCurrencyGenerator( Integer id, String currency, Float intervalBg, Float intervalEnd, Integer time ) {
        if( intervalBg >= intervalEnd || time <= 0 || currencyThreadList.get(id) != null ) {
            return false;
        }
        CurrencyThread currencyThread = new CurrencyThread(currency, intervalBg , intervalEnd, time, this.xmlParser);
        currencyThread.start();
        currencyThreadList.put(id, currencyThread);
        System.out.println( currency + " generator created !");
        return true;
    }

    @WebMethod
    public Float getLastValue( Integer id ) {
        if( currencyThreadList.get(id) == null ) {
            return Float.valueOf(-1);
        }
        return Float.parseFloat(XmlParser.DF.format(currencyThreadList.get(id).getLastValue()));
    }

    @WebMethod
    public ArrayList<Float> getAllValues( Integer id ) {
        if( currencyThreadList.get(id) == null ) {
            return null;
        }
        return currencyThreadList.get(id).getAllValues();
    }

    @WebMethod
    public ArrayList<Float> getAllLastValues( ArrayList<Integer> idList ) {
        ArrayList<Float> valuesList = new ArrayList<>();
        for (Integer id :
                idList) {
            if (currencyThreadList.get(id) != null) {
                valuesList.add(Float.parseFloat(XmlParser.DF.format(currencyThreadList.get(id).getLastValue())));
            }
        }
        return valuesList;
    }
}
